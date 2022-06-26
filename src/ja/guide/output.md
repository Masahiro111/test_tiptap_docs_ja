---
tableOfContents: true
---

# 出力

## はじめに

<!-- You can store your content as a JSON object or as a good old HTML string. Both work fine. And of course, you can pass both formats to the editor to restore your content. Here is an interactive example, that exports the content as HTML and JSON when the document is changed: -->

コンテンツは JSON オブジェクトまたは古き良き HTML 文字列として保存できます。どちらも正常に動作します。もちろん、両方の形式をエディターに渡してコンテンツを復元することもできます。これは、ドキュメントが変更されたときにコンテンツを HTML および JSON としてエクスポートするインタラクティブな例です。

## 書き出し

### オプション1：JSON

JSON はおそらく、たとえばメンションを探すためにループするのが簡単で、Tiptap が内部で使用するものに似ています。とにかく、JSON を使用してコンテンツを保存する場合は、コンテンツを JSON として取得するメソッドを提供します。

<!-- JSON is probably easier to loop through, for example to look for a mention and it’s more like what Tiptap uses under the hood. Anyway, if you want to use JSON to store the content we provide a method to retrieve the content as JSON: -->

```js
const json = editor.getJSON()
```

<!-- You can store that in your database (or send it to an API) and restore the document initially like that: -->

これをデータベースに保存して（またはAPIに送信して）、最初は次のようにドキュメントを復元できます。

```js
new Editor({
  content: {
    "type": "doc",
    "content": [
      // …
    ]
  },
})
```

<!-- Or if you need to wait for something, you can do it later through the editor instance: -->

または、何かを待つ必要がある場合は、後でエディターインスタンスを使用してそれを行うことができます。

```js
editor.commands.setContent({
  "type": "doc",
  "content": [
    // …
  ]
})
```

<!-- Here is an interactive example where you can see that in action: -->


https://embed.tiptap.dev/preview/GuideContent/ExportJSON?hideSource

### オプション2：HTML

HTML は、電子メールなどの他の場所で簡単にレンダリングでき、頻繁に使用されるため、ある時点でエディターを切り替える方がおそらく簡単です。とにかく、すべてのエディターインスタンスは、現在のドキュメントからHTMLを取得するためのメソッドを提供します。

<!-- HTML can be easily rendered in other places, for example in emails and it’s wildly used, so it’s probably easier to switch the editor at some point. Anyway, every editor instance provides a method to get HTML from the current document: -->

```js
const html = editor.getHTML()
```

<!-- This can then be used to restore the document initially: -->

これを使用して、最初にドキュメントを復元できます。

```js
new Editor({
  content: `<p>Example Text</p>`,
})
```

<!-- Or if you want to restore the content later (e. g. after an API call has finished), you can do that too: -->

または、後でコンテンツを復元する場合（たとえば、API呼び出しが終了した後）、それも実行できます。

```js
editor.commands.setContent(`<p>Example Text</p>`)
```

<!-- Use this interactive example to fiddle around: -->

このインタラクティブな例を使用して、いじくりまわします。

https://embed.tiptap.dev/preview/GuideContent/ExportHTML?hideSource

### オプション3：Y.js

私たちのエディターは Y.js を一流にサポートしており、[リアルタイムコラボレーション、オフライン編集、デバイス間の同期](/guide/collaborative-editing) などの機能を追加できます。

内部的には、Y.js はすべての変更の履歴を保存します。これは、ブラウザ、サーバー、接続されている他のクライアントとの同期、または USB スティックで行うことができます。ただし、Y.js にはこれらの保存された変更が必要であることを知っておくことが重要です。単純な JSON ドキュメントでは、変更をマージするのに十分ではありません。

もちろん、既存の JSON ドキュメントをインポートして開始し、Y.js から JSON を取得することはできますが、それはインポート/エクスポート形式に似ています。それはあなたの単一の情報源ではありません。上記のユースケースの1つに Y.js を追加する場合は、これを考慮することが重要です。

とは言うものの、それは素晴らしいことであり、私たちは素晴らしいバックエンドを提供しようとしています。

<!-- Our editor has top notch support for Y.js, which is amazing to add features like [realtime collaboration, offline editing, or syncing between devices](/guide/collaborative-editing). -->

<!-- Internally, Y.js stores a history of all changes. That can be in the browser, on a server, synced with other connected clients, or on a USB stick. But, it’s important to know that Y.js needs those stored changes. A simple JSON document is not enough to merge changes. -->

<!-- Sure, you can import existing JSON documents to get started and get a JSON out of Y.js, but that’s more like an import/export format. It won’t be your single source. That’s important to consider when adding Y.js for one of the mentioned use cases. -->

<!-- That said, it’s amazing and we’re about to provide an amazing backend, that makes all that a breeze. -->

### マークダウンはオプションではありません

残念ながら、**Tiptap は入力または出力形式として Markdown をサポートしていません。** サポートを追加することを検討しましたが、それを行わないことにした理由は次のとおりです。

* HTML と JSON はどちらも、深くネストされた構造を持つことができ、Markdown はフラットなため。
* Markdown の基準が異なるため。
* Tiptap の強みはカスタマイズですが、Markdown ではうまく機能しないため。
* HTML を Markdown に、またはその逆に変換するのに十分なパッケージがあるため。

HTML または JSON を使用してコンテンツを保存することを検討する必要があります。これらは、ほとんどのユースケースで完全に問題ありません。

それでもMarkdownが必要だと思われる場合は、ProseMirrorに[Markdownの処理方法の例]（https://prosemirror.net/examples/markdown/）、[Nextcloud Text]（https://github.com/nextcloud/ text）はTiptap1を使用してMarkdownを操作します。多分あなたはそれらから学ぶことができます。または、本当に優れたMarkdownエディターをお探しの場合は、[CodeMirror]（https://codemirror.net/）をお試しください。

そうは言っても、Tiptapはコンテンツをフォーマットするための[Markdownショートカット]（/ examples / markdown-shortcuts）をサポートしています。また、コンテンツをMarkdownのように見せることもできます。たとえば、CSSで `<h1>`の前に`＃`を追加します。

Unfortunately, **tiptap doesn’t support Markdown as an input or output format**. We considered to add support for it, but those are the reasons why we decided to not do it:

* Both, HTML and JSON, can have deeply nested structures, Markdown is flat.
* Markdown standards vary.
* Tiptap’s strength is customization, that doesn’t work very well with Markdown.
* There are enough packages to convert HTML to Markdown and vice-versa.

You should really consider to work with HTML or JSON to store your content, they are perfectly fine for most use cases.

If you still think you need Markdown, ProseMirror has an [example on how to deal with Markdown](https://prosemirror.net/examples/markdown/), [Nextcloud Text](https://github.com/nextcloud/text) uses Tiptap 1 to work with Markdown. Maybe you can learn from them. Or if you are looking for a really good Markdown editor, try [CodeMirror](https://codemirror.net/).

That said, Tiptap does support [Markdown shortcuts](/examples/markdown-shortcuts) to format your content. Also you’re free to let your content look like Markdown, for example add a `#` before an `<h1>` with CSS.

## Listening for changes

If you want to continuously store the updated content while people write, you can [hook into events](/api/events). Here is an example how that could look like:

```js
const editor = new Editor({
  // intial content
  content: `<p>Example Content</p>`,

  // triggered on every change
  onUpdate: ({ editor }) => {
    const json = editor.getJSON()
    // send the content to an API here
  },
})
```

## Rendering

### Option 1: Read-only instance of Tiptap

To render the saved content, set the editor to read-only. That’s how you can achieve the exact same rendering as it’s in the editor, without duplicating your CSS and other code.

https://embed.tiptap.dev/preview/GuideContent/ReadOnly

### Option 2: Generate HTML from ProseMirror JSON

If you need to render the content on the server side, for example to generate the HTML for a blog post which has been written in Tiptap, you’ll probably want to do just that without an actual editor instance.

That’s what the `generateHTML()` is for. It’s a helper function which renders HTML without an actual editor instance.

https://embed.tiptap.dev/preview/GuideContent/GenerateHTML

By the way, the other way is possible, too. The below examples shows how to generate JSON from HTML.

https://embed.tiptap.dev/preview/GuideContent/GenerateJSON

## Migration

If you’re migrating existing content to Tiptap we would recommend to get your existing output to HTML. That’s probably the best format to get your initial content into Tiptap, because ProseMirror ensures there is nothing wrong with it. Even if there are some tags or attributes that aren’t allowed (based on your configuration), Tiptap just throws them away quietly.

We’re about to go through a few cases to help with that, for example we provide a PHP package to convert HTML to a compatible JSON structure: [ueberdosis/prosemirror-to-html](https://github.com/ueberdosis/html-to-prosemirror).

[Share your experiences with us!](mailto:humans@tiptap.dev) We’d like to add more information here.

## Security

There is no reason to use one or the other because of security concerns. If someone wants to send malicious content to your server, it doesn’t matter if it’s JSON or HTML. It doesn’t even matter if you’re using Tiptap or not. You should always validate user input.
