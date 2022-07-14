---
tableOfContents: true
---

# コラボ編集

## はじめに

<!-- Real-time collaboration, syncing between different devices and working offline used to be hard. We provide everything you need to keep everything in sync with the power of [Y.js](https://github.com/yjs/yjs). The following guide helps you get started with collaborative editing in Tiptap. Don’t worry, a production-grade setup doesn’t require much code. -->

リアルタイムのコラボレーション、異なるデバイス間の同期、オフラインでの作業は、以前は困難でした。 [Y.js](https://github.com/yjs/yjs) のパワーとすべてを同期させるために必要なすべてを提供します。次のガイドは、Tiptapでの共同編集を開始するのに役立ちます。心配しないでください。本番環境グレードのセットアップでは、多くのコードは必要ありません。

## ビデオコース

私たちは、Tiptap を使用した共同テキスト編集について知っておく必要のあるすべてを教えるビデオコースに取り組んでいます。最初のビデオは、スポンサーがここで利用できます。

<!-- We are working on a video course which teaches everything you need to know about collaborative text editing with Tiptap. The first video is available for sponsors here: -->

https://tiptap.dev/screencasts/collaborative-editing/make-tiptap-collaborative

## エディターを構成する

Tiptapが使用する基本的なスキーマは、ドキュメントを同期するための優れた基盤です。 [`Collaboration`](/api/extensions/collaboration) 拡張機能を使用すると、[Y.js](https://github.com/yjs/yjs) を使用してドキュメントへの変更を追跡するようにTiptapに指示できます。

Y.js は、競合のないレプリケートされたデータ型の実装です。つまり、変更をマージするのに非常に優れています。そしてそれを達成するために、変更を順番に行う必要はありません。オフライン中にドキュメントを変更し、デバイスが再びオンラインになったときに他の変更とマージすることはまったく問題ありません。

どういうわけか、すべてのクライアントは、ある時点でドキュメントの変更を交換する必要があります。そのための最も一般的なテクノロジーは、[WebRTC](https://developer.mozilla.org/en-US/docs/Web/API/WebRTC_API)  と[WebSockets](https://developer.mozilla.org/de/docs/Web/API/WebSocket) です。なので、それらを詳しく見てみましょう。


<!-- The underyling schema Tiptap uses is an excellent foundation to sync documents. With the [`Collaboration`](/api/extensions/collaboration) extension you can tell Tiptap to track changes to the document with [Y.js](https://github.com/yjs/yjs). -->

<!-- Y.js is a conflict-free replicated data types implementation, or in other words: It’s really good in merging changes. And to achieve that, changes don’t even have to come in order. It’s totally fine to change a document while being offline and merge it with other changes when the device is online again. -->

<!-- Somehow, all clients need to interchange document modifications at some point. The most popular technologies to do that are [WebRTC](https://developer.mozilla.org/en-US/docs/Web/API/WebRTC_API) and [WebSockets](https://developer.mozilla.org/de/docs/Web/API/WebSocket), so let’s have a closer look at those: -->

### WebRTC

WebRTC は、クライアントを相互に接続するためにのみサーバーを使用します。実際のデータは、サーバーがそれについて何も知らずにクライアント間を流れます。これは、協調編集の最初のステップを実行するのに最適です。

まず、依存関係をインストールします。

<!-- WebRTC uses a server only to connect clients with each other. The actual data is then flowing between the clients, without the server knowing anything about it and that’s great to take the first steps with collaborative editing. -->

<!-- First, install the dependencies: -->

```bash
npm install @tiptap/extension-collaboration yjs y-webrtc
```

<!-- Now, create a new Y document, and register it with Tiptap: -->

次に、新しい Y ドキュメントを作成し、Tiptap に登録します。

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'
import Collaboration from '@tiptap/extension-collaboration'
import * as Y from 'yjs'
import { WebrtcProvider } from 'y-webrtc'

// A new Y document
const ydoc = new Y.Doc()
// Registered with a WebRTC provider
const provider = new WebrtcProvider('example-document', ydoc)

const editor = new Editor({
  extensions: [
    StarterKit.configure({
      // The Collaboration extension comes with its own history handling
      history: false,
    }),
    // Register the document with Tiptap
    Collaboration.configure({
      document: ydoc,
    }),
  ],
})
```

<!-- This should be enough to create a collaborative instance of Tiptap. Crazy, isn’t it? Try it out, and open the editor in two different browsers. Changes should be synced between different windows. -->

<!-- So how does this magic work? All clients need to connect with eachother, that’s the job of a *provider*. The [WebRTC provider](https://github.com/yjs/y-webrtc) is the easiest way to get started with, as it uses a public server to connect clients directly with each other, but not to sync the actual changes. This has two downsides, though. -->

これは、Tiptap のコラボレーティブインスタンスを作成するのに十分なはずです。クレイジーですね。試してみて、2つの異なるブラウザでエディタを開きます。変更は、異なるウィンドウ間で同期する必要があります。

では、この魔法はどのように機能しますか？すべてのクライアントは互いに接続する必要があります。それが*プロバイダー*の仕事です。 [WebRTCプロバイダー](https://github.com/yjs/y-webrtc) は、パブリックサーバーを使用してクライアントを相互に直接接続しますが、実際の変更を同期しないため、開始するのに最も簡単な方法です。 。ただし、これには2つの欠点があります。

<!-- 1. Browsers refuse to connect with too many clients. With Y.js it’s enough if all clients are connected indirectly, but even that isn’t possible at some point. Or in other words, it doesn’t scale well for more than 100+ concurrent clients in the same document. -->
<!-- 2. It’s likely you want to involve a server to persist changes anyway. But the WebRTC signaling server (which connects all clients with eachother) doesn’t receive the changes and therefore doesn’t know what’s in the document. -->

1. ブラウザはあまりにも多くのクライアントとの接続を拒否します。 Y.js では、すべてのクライアントが間接的に接続されていれば十分ですが、それでもある時点では不可能です。つまり、同じドキュメント内の 100を超える同時クライアントに対しては適切に拡張できません。
2. とにかく変更を永続化するために、サーバーを関与させたいと思う可能性があります。ただし、WebRTC シグナリングサーバー（すべてのクライアントを相互に接続する）は変更を受信しないため、ドキュメントの内容を認識しません。

<!-- Anyway, if you want to dive deeper, head over to [the Y WebRTC repository](https://github.com/yjs/y-webrtc) on GitHub. -->

とにかく、さらに深く掘り下げたい場合は、GitHubの [Y WebRTCリポジトリ](https://github.com/yjs/y-webrtc) にアクセスしてください。

### WebSocket（推奨）

ほとんどのユースケースでは、WebSocket プロバイダーが推奨される選択です。非常に柔軟性があり、拡張性に優れています。さらに簡単にするために、Tiptap の公式バックエンドに取り組んでいます。バックエンドはまだ早期アクセス（スポンサーのみ）ですが、プロバイダーはすでに使用できます。

クライアントの場合、例はほぼ同じですが、プロバイダーのみが異なります。まず、依存関係をインストールしましょう。

<!-- For most uses cases, a WebSocket provider is the recommended choice. It’s very flexible and can scale very well. To make it even easier, we are working on an official backend for Tiptap. The backend is still in early access (sponsors-only), but you can use the provider already. -->

<!-- For the client, the example is nearly the same, only the provider is different. First, let’s install the dependencies: -->

```bash
npm install @tiptap/extension-collaboration @hocuspocus/provider
```

<!-- And then register the WebSocket provider with Tiptap: -->

次に、WebSocket プロバイダーを Tiptap に登録します。

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'
import Collaboration from '@tiptap/extension-collaboration'
import { HocuspocusProvider } from '@hocuspocus/provider'

// Set up the Hocuspocus WebSocket provider
const provider = new HocuspocusProvider({
  url: 'ws://127.0.0.1:1234',
  name: 'example-document',
})

const editor = new Editor({
  extensions: [
    StarterKit.configure({
      // The Collaboration extension comes with its own history handling
      history: false,
    }),
    // Register the document with Tiptap
    Collaboration.configure({
      document: provider.document,
    }),
  ],
})
```

This example doesn’t work out of the box. As you can see, it’s configured to talk to a WebSocket server which is available under `ws://127.0.0.1:1234` (WebSocket protocol `ws://`, your local IP `127.0.0.1` and the port `1234`). You need to set this up, too.

この例は、そのままでは機能しません。ご覧のとおり、`ws://127.0.0.1:1234`（WebSocketプロトコル `ws://`、ローカルIP `127.0.0.1`、`1234` ポートで利用可能なWebSocketサーバーと通信するように構成されています）。これも設定する必要があります。

#### WebSocket バックエンド

サーバー部分をできるだけ簡単にするために、[Hocuspocusと呼ばれる意見のあるサーバーパッケージ](http://hocuspocus.dev/) を提供しています（現在、スポンサーとサブスクライバーのみが利用できます）。これは柔軟なNode.jsパッケージであり、カスタムバックエンドの構築に使用できます。

このガイドの目的のために、最小限のサーバーを文字通り数秒で起動するコマンドラインインターフェイスを使用してみましょう。

<!-- To make the server part as easy as possible, we provide [an opinionated server package, called Hocuspocus](http://hocuspocus.dev/) (currently available for sponsors and subscribers only). It’s a flexible Node.js package, that you can use to build your custom backend. -->

<!-- For the purpose of that guide, let’s just use the command-line interface which boots a minimal server literally in seconds: -->

```bash
npx @hocuspocus/cli --port 1234 --sqlite
```

<!-- This command downloads the Hocuspocus command-line interface, starts a server listening on port 1234 and stores changes in the memory (so it’s gone once you stop the command). The output should look like this: -->

このコマンドは、Hocuspocus コマンドラインインターフェイスをダウンロードし、ポート1234 でリッスンしているサーバーを起動し、変更をメモリに保存します（したがって、コマンドを停止すると、サーバーは削除されます）。出力は次のようになります。

```
Hocuspocus v1.0.0 running at:

> HTTP: http://127.0.0.1:1234
> WebSocket: ws://127.0.0.1:1234

Ready.
```

<!-- Try opening http://127.0.0.1:1234 in your browser. You should see a plain text `OK` if everything works fine. -->

<!-- Go back to your Tiptap editor and hit reload, it should now connect to the Hocuspocus WebSocket server and changes should sync with all other clients. Amazing, isn’t it? -->

ブラウザで http://127.0.0.1:1234 を開いてみてください。すべてが正常に機能する場合は、プレーンテキスト「OK」が表示されるはずです。

Tiptap エディターに戻り、リロードを押します。これで Hocuspocus WebSocket サーバーに接続され、変更が他のすべてのクライアントと同期されるはずです。すごいですね。

### 複数のネットワークプロバイダー

複数のプロバイダーを組み合わせることもできます。これは必須ではありませんが、1つの接続（WebSocketサーバーなど）がしばらくダウンした場合でも、クライアントの接続を維持できます。次に例を示します。

<!-- You can even combine multiple providers. That’s not needed, but could keep clients connected, even if one connection - for example the WebSocket server - goes down for a while. Here is an example: -->

```js
new WebrtcProvider('example-document', ydoc)
new HocuspocusProvider({
  url: 'ws://127.0.0.1:1234',
  name: 'example-document',
  document: ydoc,
})
```

<!-- Yes, that’s all. -->

<!-- Keep in mind that WebRTC needs a signaling server to connect clients. This signaling server doesn’t receive the synced data, but helps to let clients find each other. You can [run your own signaling server](https://github.com/yjs/y-webrtc#signaling), if you like. Otherwise it’s using a default URL baked into the package. -->

はい、それだけです。

WebRTC には、クライアントを接続するためのシグナリングサーバーが必要であることに注意してください。このシグナリングサーバーは同期されたデータを受信しませんが、クライアントがお互いを見つけられるようにするのに役立ちます。必要に応じて、[独自のシグナリングサーバーを実行する](https://github.com/yjs/y-webrtc#signaling) ことができます。それ以外の場合は、パッケージに組み込まれているデフォルトの URL を使用しています。

### 他のカーソルを表示する

ユーザーがカーソルとテキストの選択を相互に表示できるようにするには、[`CollaborationCursor`](/api/extensions/collaboration-cursor) 拡張機能を追加します。

<!-- To enable users to see the cursor and text selections of each other, add the [`CollaborationCursor`](/api/extensions/collaboration-cursor) extension. -->

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'
import Collaboration from '@tiptap/extension-collaboration'
import CollaborationCursor from '@tiptap/extension-collaboration-cursor'
import { HocuspocusProvider } from '@hocuspocus/provider'

// Set up the Hocuspocus WebSocket provider
const provider = new HocuspocusProvider({
  url: 'ws://127.0.0.1:1234',
  name: 'example-document',
})

const editor = new Editor({
  extensions: [
    StarterKit.configure({
      // The Collaboration extension comes with its own history handling
      history: false,
    }),
    Collaboration.configure({
      document: provider.document,
    }),
    // Register the collaboration cursor extension
    CollaborationCursor.configure({
      provider: provider,
      user: {
        name: 'Cyndi Lauper',
        color: '#f783ac',
      },
    }),
  ],
})
```

<!-- As you can see, you can pass a name and color for every user. Look at the [collaborative editing example](/examples/collaborative-editing), to see a more advanced example. -->

ご覧のとおり、すべてのユーザーに名前と色を渡すことができます。 [コラボ編集の例](/examples/collaborative-editing) を見て、より高度な例を確認してください。

### オフラインサポート

素晴らしい[YIndexedDBアダプター](https://github.com/yjs/y-indexeddb) のおかげで、コラボレーションエディターにオフラインサポートを追加するのは基本的にワンライナーです。それをインストールします：

<!-- Adding offline support to your collaborative editor is basically a one-liner, thanks to the fantastic [Y IndexedDB adapter](https://github.com/yjs/y-indexeddb). Install it: -->

```bash
npm install y-indexeddb
```

<!-- And connect it with a Y document: -->

そしてそれを Y ドキュメントに接続します：

```js
import { Editor } from '@tiptap/core'
import Collaboration from '@tiptap/extension-collaboration'
import * as Y from 'yjs'
import { IndexeddbPersistence } from 'y-indexeddb'

const ydoc = new Y.Doc()

// Store the Y document in the browser
new IndexeddbPersistence('example-document', ydoc)

const editor = new Editor({
  extensions: [
    // …
    Collaboration.configure({
      document: ydoc,
    }),
  ],
})
```

<!-- All changes will be stored in the browser then, even if you close the tab, go offline, or make changes while working offline. Next time you are online, the WebSocket provider will try to find a connection and eventually sync the changes. -->

<!-- Yes, it’s magic. As already mentioned, that is all based on the fantastic Y.js framework. And if you’re using it, or our integration, you should definitely [sponsor Kevin Jahns on GitHub](https://github.com/dmonad), he is the brain behind Y.js. -->

タブを閉じたり、オフラインにしたり、オフラインで作業しているときに変更を加えたりしても、すべての変更はブラウザに保存されます。次回オンラインになると、WebSocket プロバイダーは接続を見つけようとし、最終的に変更を同期します。

はい、それは魔法です。すでに述べたように、それはすべて素晴らしい Y.js フレームワークに基づいています。そして、それを使用している場合、または私たちの統合を使用している場合は、間違いなく [GitHub の Kevin Jahns のスポンサー](https://github.com/dmonad) である必要があります。彼はY.jsの背後にある頭脳です。

## プラグアンドプレイコラボレーションバックエンド

コラボ編集バックエンドは、同期、承認、永続性、スケーリングを処理します。ここでは、いくつかの一般的な使用例を見ていきましょう。

> 警告早期アクセスをリクエストする
> プラグアンドプレイコラボレーションバックエンド hocuspocus はまだ進行中です。試してみたい場合は、[早期アクセスを取得](https://www.hocuspocus.dev) してください。
：：：

<!-- Our collaborative editing backend handles the syncing, authorization, persistence and scaling. Let’s go through a few common use cases here! -->

<!-- :::warning Request early access -->
<!-- Our plug & play collaboration backend hocuspocus is still work in progress. If you want to give it a try, [get early access](https://www.hocuspocus.dev). -->
:::

### ドキュメント名

ドキュメント名は、ここにあるすべての例で `'example-document'` ですが、任意の文字列にすることができます。実際のアプリでは、エンティティの名前とエンティティの ID を追加する可能性があります。これがどのように見えるかです。

<!-- The document name is `'example-document'` in all examples here, but it could be any string. In a real-world app you’d probably add the name of your entity and the ID of the entity. Here is how that could look like: -->

```js
const documentName = 'page.140'
```

バックエンドでは、文字列を分割して、ユーザーが ID 140 のページに入力していることを確認し、それに応じて認証などを管理できます。新しいドキュメントはその場で作成され、プロバイダーに文字列を渡す以外に、バックエンドにそれらについて通知する必要はありません。

また、複数のフィールドを 1つの Y.js ドキュメントと同期する場合は、コラボレーション拡張機能に異なるフラグメント名を渡すだけです。

<!-- In the backend, you can split the string to know the user is typing on a page with the ID 140 to manage authorization and such accordingly. New documents are created on the fly, no need to tell the backend about them, besides passing a string to the provider. -->

<!-- And if you would like to sync multiple fields with one Y.js document, just pass different fragment names to the collaboration extension: -->

```js
// a Tiptap instance for the field
Collaboration.configure({
  document: ydoc,
  field: 'title',
})

// and another instance for the summary, both in the same Y.js document
Collaboration.configure({
  document: ydoc,
  field: 'summary',
})
```

<!-- If your setup is somehow more complex, for example with nested fragments, you can pass a raw Y.js fragment too. `document` and `field` will be ignored then. -->

ネストされたフラグメントなど、セットアップがやや複雑な場合は、生の Y.js フラグメントを渡すこともできます。その場合、`document` と `field` は無視されます。


```js
// a raw Y.js fragment
Collaboration.configure({
  fragment: ydoc.getXmlFragment('custom'),
})
```

### 認証と承認

`onAuthenticate` フックを使用すると、クライアントが現在のドキュメントを表示するために認証および承認されているかどうかを確認できます。実際のアプリケーションでは、これはおそらく API、データベースクエリ、またはその他への要求になります。

エラーをスローする（または返された Promise を拒否する）と、クライアントへの接続は終了します。クライアントが承認および認証されている場合は、他のフックでアクセスできるコンテキストデータを返すこともできます。しかし、そうする必要はありません。

<!-- With the `onAuthenticate` hook you can check if a client is authenticated and authorized to view the current document. In a real world application this would probably be a request to an API, a database query or something else. -->

<!-- When throwing an error (or rejecting the returned Promise), the connection to the client will be terminated. If the client is authorized and authenticated you can also return contextual data which will be accessible in other hooks. But you don’t need to. -->

```js
import { Server } from '@hocuspocus/server'

const server = Server.configure({
  async onAuthenticate({ token }) {
    // Example test if a user is authenticated
    if (token !== 'super-secret-token') {
      throw new Error('Not authorized!')
    }

    // You can set contextual data to use it in other hooks
    return {
      user: {
        id: 1234,
        name: 'John',
      },
    }
  },
})

server.listen()
```

## 落とし穴

### スキーマの更新

Tiptap は [schema](/api/schema) に対して非常に厳密です。つまり、構成されたスキーマに従って許可されていないものを追加すると、破棄されます。スキーマが異なる複数のクライアントがドキュメントへの変更を共有する場合、これは奇妙な動作につながる可能性があります。

アプリにエディターを追加し、最初のユーザーがすでにそれを使用しているとします。それらには、すべてのデフォルト拡張機能を備えたTiptap のすべてのロードされたインスタンスがあり、そのため、それらのみを許可するスキーマがあります。ただし、次の更新でタスクリストを追加したいので、拡張機能を追加して再度デプロイします。

新しいユーザーがアプリを開き、更新されたスキーマ（タスクリストあり）を持っていますが、他のすべてのユーザーは古いスキーマ（タスクリストなし）を持っています。新しいユーザーは、新しく追加されたタスクリストをチェックアウトし、それをドキュメントに追加して、そのドキュメント内の他のユーザーにその機能を表示します。しかし、その後、彼女がそれを追加した直後にそれは魔法のように消えます。どうしたの？

1人のユーザーが新しいノード（またはマーク）を追加すると、その変更は接続されている他のすべてのクライアントに同期されます。接続されている他のクライアントは、これらの変更をエディターに適用します。Tiptap は、（古い）スキーマでは許可されていないため、そのまま厳密に、新しく追加されたノードを削除します。これらの変更は、接続されている他のクライアントやおっとに同期され、すべての場所で削除されます。これを回避するには、いくつかのオプションがあります。

1. スキーマを変更しないでください（クールではありません）。
2. 新しいスキーマをデプロイするときにクライアントを強制的に更新します（タフ）。
3. スキーマのバージョンを追跡し、古いスキーマを持つクライアントのエディターを無効にします（セットアップによって異なります）。

それを簡単にする機能を提供することは私たちのリストにあります。それを改善する方法がわかったら、それを私たちと共有してください！

<!-- tiptap is very strict with the [schema](/api/schema), that means, if you add something that’s not allowed according to the configured schema it’ll be thrown away. That can lead to a strange behaviour when multiple clients with different schemas share changes to a document. -->

<!-- Let’s say you added an editor to your app and the first people use it already. They have all a loaded instance of Tiptap with all default extensions, and therefor a schema that only allows those. But you want to add task lists in the next update, so you add the extension and deploy again. -->

<!-- A new user opens your app and has the updated schema (with task lists), while all others still have the old schema (without task lists). The new user checks out the newly added tasks lists and adds it to a document to show that feature to other users in that document. But then, it magically disappears right after she added it. What happened? -->

<!-- When one user adds a new node (or mark), that change will be synced to all other connected clients. The other connected clients apply those changes to the editor, and Tiptap, strict as it is, removes the newly added node, because it’s not allowed according to their (old) schema. Those changes will be synced to other connected clients and oops, it’s removed everywhere. To avoid this you have a few options: -->

<!-- 1. Never change the schema (not cool). -->
<!-- 2. Force clients to update when you deploy a new schema (tough). -->
<!-- 3. Keep track of the schema version and disable the editor for clients with an outdated schema (depends on your setup). -->

<!-- It’s on our list to provide features to make that easier. If you’ve got an idea how to improve that, share it with us! -->
