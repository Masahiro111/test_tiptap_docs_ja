---
description: See other user’s cursors and their name while they type.
icon: account-pin-circle-line
---

# コラボ編集のカーソル

[![Version](https://img.shields.io/npm/v/@tiptap/extension-collaboration-cursor.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-collaboration-cursor)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-collaboration-cursor.svg)](https://npmcharts.com/compare/@tiptap/extension-collaboration-cursor?minimal=true)

<!-- This extension adds information about all connected users (like their name and a specified color), their current cursor position and their text selection (if there’s one). -->

<!-- Open this page in multiple browser windows to test it. -->

この拡張機能は、接続されているすべてのユーザー（名前や指定された色など）、現在のカーソル位置、およびテキスト選択（存在する場合）に関する情報を追加します。

このページを複数のブラウザウィンドウで開いてテストします。

<!-- :::pro Pro Extension
We kindly ask you to [sponsor our work](/sponsor) when using this extension in production.
::: -->

> pro Pro 拡張機能

> この拡張機能を本番環境で使用する場合は、[私たちの仕事のスポンサー](/sponsor) にお願いします。

## インストール

```bash
npm install @tiptap/extension-collaboration-cursor
```

<!-- This extension requires the [`Collaboration`](/api/extensions/collaboration) extension. -->

この拡張機能には、[`Collaboration`](/api/extensions/collaboration) 拡張機能が必要です。

## 設定

### プロバイダー

A Y.js network provider, for example a [y-websocket](https://github.com/yjs/y-websocket) instance.

Y.js ネットワークプロバイダー。たとえば、[y-websocket](https://github.com/yjs/y-websocket) インスタンス。

Default: `null`

### ユーザー

<!-- Attributes of the current user, assumes to have a name and a color, but can be used with any attribute. The values are synced with all other connected clients. -->

現在のユーザーの属性は、名前と色を想定していますが、任意の属性で使用できます。値は、接続されている他のすべてのクライアントと同期されます。

Default: `{ user: null, color: null }`

### レンダー

<!-- A render function for the cursor, look at [the extension source code](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-collaboration-cursor/) for an example. -->

カーソルのレンダリング関数。例については、[拡張ソースコード](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-collaboration-cursor/) を参照してください。

## コマンド

### updateUser()

<!-- Pass an object with updated attributes of the current user. It expects a `name` and a `color`, but you can add additional fields, too. -->

現在のユーザーの属性が更新されたオブジェクトを渡します。`name` と `color` を想定していますが、フィールドを追加することもできます。

```js
editor.commands.updateUser({
  name: 'John Doe',
  color: '#000000',
  avatar: 'https://unavatar.io/github/ueberdosis',
})
```

## ソースコード

[packages/extension-collaboration-cursor/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-collaboration-cursor/)

## 使い方

<!-- :::warning Public
The content of this editor is shared with other users.
::: -->

> このエディタの内容は他のユーザーと共有されます。

https://embed.tiptap.dev/preview/Extensions/CollaborationCursor?hideSource
https://embed.tiptap.dev/preview/Extensions/CollaborationCursor
