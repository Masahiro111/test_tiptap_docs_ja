---
description: Adds a cursor when something is dragged inside the editor.
icon: drag-drop-line
---

# ドロップカーソル

[![Version](https://img.shields.io/npm/v/@tiptap/extension-dropcursor.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-dropcursor)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-dropcursor.svg)](https://npmcharts.com/compare/@tiptap/extension-dropcursor?minimal=true)

<!-- This extension loads the [ProseMirror Dropcursor plugin](https://github.com/ProseMirror/prosemirror-dropcursor) by Marijn Haverbeke, which shows a cursor at the drop position when something is dragged into the editor. -->

この拡張機能は、Marijn Haverbeke による [ProseMirror Dropcursor プラグイン](https://github.com/ProseMirror/prosemirror-dropcursor) を読み込みます。これは、エディターに何かをドラッグすると、ドロップ位置にカーソルを表示します。

<!-- Note that Tiptap is headless, but the dropcursor needs CSS for its appearance. There are settings for the color and width, and you’re free to add a custom CSS class. -->

Tiptap はヘッドレスですが、ドロップカーソルの外観には CSS が必要です。 色と幅の設定があり、カスタム CSS クラスを自由に追加できます。

## インストール

```bash
npm install @tiptap/extension-dropcursor
```

## 設定

### color

<!-- Color of the dropcursor. -->

ドロップカーソルの色。

Default: `'currentcolor'`

```js
Dropcursor.configure({
  color: '#ff0000'
})
```

### width

<!-- Width of the dropcursor. -->

ドロップカーソルの幅。

Default: `1`

```js
Dropcursor.configure({
  width: 2,
})
```

### class

<!-- One or multiple CSS classes that should be applied to the dropcursor. -->

ドロップカーソルに適用する必要がある1つまたは複数のCSSクラス。

```js
Dropcursor.configure({
  class: 'my-custom-class',
})
```

## ソースコード

[packages/extension-dropcursor/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-dropcursor/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/Dropcursor
