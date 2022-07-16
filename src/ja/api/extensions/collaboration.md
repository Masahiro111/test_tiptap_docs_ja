---
description: Collaborative text editing can be fricking complex, but it doesn’t have to be that way.
icon: user-voice-line
---

# コラボレーション

[![Version](https://img.shields.io/npm/v/@tiptap/extension-collaboration.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-collaboration)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-collaboration.svg)](https://npmcharts.com/compare/@tiptap/extension-collaboration?minimal=true)

<!-- The Collaboration extension enables you to collaborate with others in a single document. The implementation is based on [Y.js by Kevin Jahns](https://github.com/yjs/yjs), which is the coolest thing to [integrate collaborative editing](/guide/collaborative-editing) in your project. -->

<!-- The history works totally different in a collaborative editing setup. If you undo a change, you don’t want to undo changes of other users. To handle that behaviour this extension provides an own `undo` and `redo` command. Don’t load the default [`History`](/api/extensions/history) extension together with the Collaboration extension to avoid conflicts. -->

コラボレーション拡張機能を使用すると、1つのドキュメントで他のユーザーとコラボレーションできます。実装は [Y.jsbyKevin Jahns](https://github.com/yjs/yjs) に基づいています。これは、プロジェクトで [コラボ編集の統合](/guide/collaborative-editing) の最も優れた機能です。

協調編集の設定では、履歴はまったく異なります。変更を元に戻す場合、他のユーザーの変更を元に戻す必要はありません。この動作を処理するために、この拡張機能は独自の `undo` および `redo` コマンドを提供します。競合を避けるために、デフォルトの [`History`](/api/extensions/history) 拡張機能をCollaboration拡張機能と一緒にロードしないでください。

<!-- :::pro Pro Extension
We kindly ask you to [sponsor our work](/sponsor) when using this extension in production.
::: -->

> **proPro拡張機能**
この拡張機能を本番環境で使用する場合は、[私たちの仕事のスポンサー](/sponsor) にお願いします。

## インストール

```bash
npm install @tiptap/extension-collaboration yjs y-websocket
```

## 設定

### ドキュメント

<!-- An initialized Y.js document. -->

初期化された Y.js ドキュメント。

Default: `null`

```js
Collaboration.configure({
  document: new Y.Doc(),
})
```

### フィールド

<!-- Name of a Y.js fragment, can be changed to sync multiple fields with one Y.js document. -->

Y.js フラグメントの名前は、複数のフィールドを 1つの Y.js ドキュメントと同期するように変更できます。

Default: `'default'`

```js
Collaboration.configure({
  document: new Y.Doc(),
  field: 'title',
})
```

### フラグメント

生の Y.js フラグメントは、`document` と `field` の代わりに使用できます。

<!-- A raw Y.js fragment, can be used instead of `document` and `field`. -->

Default: `null`

```js
Collaboration.configure({
  fragment: new Y.Doc().getXmlFragment('body'),
})
```

## コマンド

`Collboration` 拡張機能には、独自の履歴拡張機能が付属しています。`StarterKit` を使用している場合は、必ずデフォルトの拡張機能を無効にしてください。

<!-- The `Collboration` extension comes with its own history extension. Make sure to disable the default extension, if you’re working with the `StarterKit`. -->

### undo()

<!-- Undo the last change. -->

最後の変更を元に戻します。

```js
editor.commands.undo()
```
### redo()

<!-- Redo the last change. -->

最後の変更をやり直します。

```js
editor.commands.redo()
```

## キーボード ショートカット

| コマンド | Windows / Linux                                         | macOS                                         |
| ------- | ----------------------------------------------------- | --------------------------------------------- |
| undo()  | `Ctrl`&nbsp;+&nbsp;`Z`                                    | `Cmd`&nbsp;+&nbsp;`Z`                                |
| redo()  | `Shift`&nbsp;+&nbsp;`Ctrl`&nbsp;+&nbsp;`Z`<br>`Ctrl`&nbsp;+&nbsp;`Y` | `Shift`&nbsp;+&nbsp;`Cmd`&nbsp;+&nbsp;`Z`<br>`Cmd`&nbsp;+&nbsp;`Y` |

## ソースコード

[packages/extension-collaboration/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-collaboration/)

## 使い方

<!-- :::warning Public
The content of this editor is shared with other users.
::: -->

> **警告**
このエディタの内容は他のユーザーと共有されます。

https://embed.tiptap.dev/preview/Extensions/Collaboration?hideSource
https://embed.tiptap.dev/preview/Extensions/Collaboration
