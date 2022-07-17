---
description: Developers love to add some inline code to their texts.
icon: code-view
---

# Code

[![Version](https://img.shields.io/npm/v/@tiptap/extension-code.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-code)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-code.svg)](https://npmcharts.com/compare/@tiptap/extension-code?minimal=true)

<!-- The Code extensions enables you to use the `<code>` HTML tag in the editor. If you paste in text with `<code>` tags it will rendered accordingly. -->

<!-- Type something with <code>\`back-ticks around\`</code> and it will magically transform to `inline code` while you type. -->

コード拡張機能を使用すると、エディターで `<code>` HTML タグを使用できます。`<code>` タグを付けてテキストを貼り付けると、それに応じてレンダリングされます。

<code>\`back-ticks around\`</code> を使用して何かを入力すると、入力中に魔法のように `inline code` に変換されます。

## インストール

```bash
npm install @tiptap/extension-code
```

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
Code.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## Commands

### setCode()
<!-- Mark text as inline code. -->

テキストをインラインコードとしてマークします。

```js
editor.commands.setCode()
```

### toggleCode()
<!-- Toggle inline code mark. -->

インラインコードマークを切り替えます。

```js
editor.commands.toggleCode()
```

### unsetCode()
<!-- Remove inline code mark. -->

インラインコードマークを削除します。

```js
editor.commands.unsetCode()
```

## キーボード ショートカット
| コマンド      | Windows/Linux      | macOS          |
| ------------ | ------------------ | -------------- |
| toggleCode() | `Ctrl` + `E` | `Cmd` + `E` |

## ソースコード

[packages/extension-code/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-code/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Code
