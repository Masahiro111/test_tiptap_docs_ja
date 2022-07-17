---
description: Add a line below your text to make it look more … underlined.
icon: underline
---

# Underline
[![Version](https://img.shields.io/npm/v/@tiptap/extension-underline.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-underline)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-underline.svg)](https://npmcharts.com/compare/@tiptap/extension-underline?minimal=true)

<!-- Use this extension to render text <u>underlined</u>. If you pass `<u>` tags, or text with inline `style` attributes setting `text-decoration: underline` in the editor’s initial content, they all will be rendered accordingly. -->

<!-- Be aware that underlined text in the Internet usually indicates that it’s a clickable link. Don’t confuse your users with underlined text. -->

この拡張機能を使用して、テキストを <u>下線付き</u> でレンダリングします。 `<u>` タグを渡すか、エディターの初期コンテンツで `text-decoration: underline` を設定するインライン ` style` 属性を持つテキストを渡すと、それらはすべてそれに応じてレンダリングされます。

インターネットで下線が引かれたテキストは、通常、クリック可能なリンクであることを示していることに注意してください。ユーザーを下線付きのテキストと混同しないでください。

<!-- ::: warning Restrictions
The extension will generate the corresponding `<u>` HTML tags when reading contents of the `Editor` instance. All text marked underlined, regardless of the method will be normalized to `<u>` HTML tags.
::: -->

> 警告：制限
拡張機能は、`Editor` インスタンスのコンテンツを読み取るときに対応する `<u>` HTML タグを生成します。メソッドに関係なく、下線付きでマークされたすべてのテキストは、`<u>` HTML タグに正規化されます。

## インストール

```bash
npm install @tiptap/extension-underline
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Underline.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setUnderline()

<!-- Marks a text as underlined. -->

テキストに下線付きのマークを付けます。

```js
editor.commands.setUnderline()
```

### toggleUnderline()

<!-- Toggles an underline mark. -->

下線マークを切り替えます。

```js
editor.commands.toggleUnderline()
```

### unsetUnderline()

<!-- Removes an underline mark. -->

下線マークを削除します。

```js
editor.commands.unsetUnderline()
```

## キーボード ショートカット

| コマンド           | Windows/Linux      | macOS          |
| ----------------- | ------------------ | -------------- |
| toggleUnderline() | `Ctrl` + `U` | `Cmd` + `U` |

## ソースコード

[packages/extension-underline/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-underline/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Underline
