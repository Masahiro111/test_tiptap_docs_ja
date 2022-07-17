---
description: Write slightly below the normal line to show you’re unique.
icon: subscript
---

# Subscript

[![Version](https://img.shields.io/npm/v/@tiptap/extension-subscript.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-subscript)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-subscript.svg)](https://npmcharts.com/compare/@tiptap/extension-subscript?minimal=true)

<!-- Use this extension to render text in <sub>subscript</sub>. If you pass `<sub>` or text with `vertical-align: sub` as inline style in the editor’s initial content, both will be normalized to a `<sub>` HTML tag. -->

この拡張機能を使用して、<sub>subscript</sub> のテキストをレンダリングします。エディターの初期コンテンツでインラインスタイルとして `<sub>` または `vertical-align: sub` を含むテキストを渡すと、両方とも `<sub>` HTML タグに正規化されます。

## インストール

```bash
npm install @tiptap/extension-subscript
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
Subscript.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setSubscript()

<!-- Mark text as subscript. -->

テキストを下付き文字としてマークします。

```js
editor.commands.setSubscript()
```

### toggleSubscript()

<!-- Toggle subscript mark. -->

下付き文字マークを切り替えます。

```js
editor.commands.toggleSubscript()
```

### unsetSubscript()

<!-- Remove subscript mark. -->

下付き文字を削除します。

```js
editor.commands.unsetSubscript()
```

## キーボード ショートカット

| コマンド           | Windows/Linux      | macOS          |
| ----------------- | ------------------ | -------------- |
| toggleSubscript() | `Ctrl` + `,` | `Cmd` + `,` |

## ソースコード

[packages/extension-subscript/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-subscript/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Subscript
