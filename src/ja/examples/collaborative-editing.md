---
tableOfContents: true
---

# コラボ編集

## はじめに

<!-- This example shows how you can use Tiptap to let multiple users collaborate in the same document in real-time. -->

<!-- It connects all clients to a WebSocket server and merges changes to the document with the power of [Y.js](https://github.com/yjs/yjs). If you want to learn more about collaborative text editing, check out [our guide on collaborative editing](/guide/collaborative-editing). -->

この例は、Tiptap を使用して、複数のユーザーが同じドキュメントでリアルタイムに共同作業できるようにする方法を示しています。

すべてのクライアントを WebSocket サーバーに接続し、[Y.js](https://github.com/yjs/yjs) の機能を使用してドキュメントへの変更をマージします。協調編集について詳しく知りたい場合は、[協調編集に関するガイド](/guide/collaborative-editing) をご覧ください。

## 例

> **警告共有ドキュメント**
いいね！このエディタのコンテンツは、インターネットの他のユーザーと共有されます。

<!-- :::warning Shared Document
Be nice! The content of this editor is shared with other users from the Internet.
::: -->

https://embed.tiptap.dev/preview/Examples/CollaborativeEditing

## バックエンド

<!-- In case you’re wondering what kind of sorcery you need on the server to achieve this, here is the whole backend code for the demo: -->

:::warning Request early access
Our plug & play collaboration backend hocuspocus is still work in progress. If you want to give it a try, [get early access](https://www.hocuspocus.dev).
:::

これを実現するためにサーバーにどのような種類のソーサリーが必要か疑問に思われる場合は、デモのバックエンドコード全体を次に示します。

> 警告早期アクセスをリクエストする
>プラグアンドプレイコラボレーションバックエンド hocuspocus はまだ進行中です。 試してみたい場合は、[早期アクセスを取得](https://www.hocuspocus.dev) してください。

```js
import { Server } from '@hocuspocus/server'
import { RocksDB } from '@hocuspocus/extension-rocksdb'

const server = Server.configure({
  port: 80,
  extensions: [
    new RocksDB({ path: './database' }),
  ],
})

server.listen()
```
