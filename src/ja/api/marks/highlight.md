---
description: Make it look nerdier with some colorful text highlights.
icon: mark-pen-line
---

# Highlight

[![Version](https://img.shields.io/npm/v/@tiptap/extension-highlight.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-highlight)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-highlight.svg)](https://npmcharts.com/compare/@tiptap/extension-highlight?minimal=true)

<!-- Use this extension to render highlighted text with `<mark>`. You can use only default `<mark>` HTML tag, which has a yellow background color by default, or apply different colors. -->

<!-- Type `==two equal signs==` and it will magically transform to <mark>highlighted</mark> text while you type. -->

この拡張機能は、強調表示されたテキストを `<mark>` でレンダリングします。デフォルトで黄色の背景色を持つデフォルトの `<mark>` HTML タグのみを使用するか、異なる色を適用できます。

`==two equal sign==`と入力すると、入力中に <mark >ハイライトされた</mark> テキストに魔法のように変換されます。

## インストール

```bash
npm install @tiptap/extension-highlight
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタムHTML属性。

```js
Highlight.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### multicolor
<!-- Add support for multiple colors. -->

複数の色のサポートを追加します。

Default: `false`

```js
Highlight.configure({
  multicolor: true,
})
```

## コマンド

### setHighlight()

<!-- Mark text as highlighted. -->

テキストを強調表示としてマークします。

```js
editor.commands.setHighlight()
editor.commands.setHighlight({ color: '#ffcc00' })
```

### toggleHighlight()
<!-- Toggle a text highlight. -->

テキストのハイライトを切り替えます。

```js
editor.commands.toggleHighlight()
editor.commands.toggleHighlight({ color: '#ffcc00' })
```

### unsetHighlight()
 <!-- Removes the highlight. -->

  ハイライトを削除します。

```js
editor.commands. unsetHighlight()
```


## キーボード ショートカット

| コマンド           | Windows/Linux                   | macOS                       |
| ----------------- | ------------------------------- | --------------------------- |
| toggleHighlight() | `Control` + `Shift` + `H` | `Cmd` + `Shift` + `H` |

## ソースコード
[packages/extension-highlight/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-highlight/)

## 使い方
https://embed.tiptap.dev/preview/Marks/Highlight
