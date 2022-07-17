---
description: Helps to emphasize your text, doesn’t bring you closer to Italy though.
icon: italic
---

# Italic

[![Version](https://img.shields.io/npm/v/@tiptap/extension-italic.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-italic)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-italic.svg)](https://npmcharts.com/compare/@tiptap/extension-italic?minimal=true)

<!-- Use this extension to render text in *italic*. If you pass `<em>`, `<i>` tags, or text with inline `style` attributes setting `font-style: italic` in the editor’s initial content, they all will be rendered accordingly. -->

<!-- Type `*one asterisk*` or `_one underline_` and it will magically transform to *italic* text while you type. -->

この拡張機能は、テキストを *斜体* でレンダリングします。エディターの初期コンテンツで `<em>`、`<i>` タグ、またはインラインの `style` 属性が `font-style: italic` を設定しているテキストを渡すと、それらはすべてそれに応じてレンダリングされます。

`*oneasterisk*` または `_oneunderline_` と入力すると、入力中に魔法のように *斜体* のテキストに変換されます。

<!-- ::: warning Restrictions -->
<!-- The extension will generate the corresponding `<em>` HTML tags when reading contents of the `Editor` instance. All text marked italic, regardless of the method will be normalized to `<em>` HTML tags. -->

> 警告：制限
拡張機能は、`Editor` インスタンスのコンテンツを読み取るときに対応する `<em>` HTML タグを生成します。メソッドに関係なく、イタリックでマークされたすべてのテキストは、`<em>` HTML タグに正規化されます。

## インストール

```bash
npm install @tiptap/extension-italic
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Italic.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setItalic()

<!-- Mark the text italic. -->

テキストを斜体でマークします。

```js
editor.commands.setItalic()
```

### toggleItalic()

<!-- Toggle the italic mark. -->

斜体のマークを切り替えます。

```js
editor.commands.toggleItalic()
```

### unsetItalic()

<!-- Remove the italic mark. -->

イタリックマークを削除します。

```js
editor.commands.unsetItalic()
```

## キーボードショートカット

| コマンド        | Windows/Linux      | macOS          |
| -------------- | ------------------ | -------------- |
| toggleItalic() | `Control` + `I` | `Cmd` + `I` |

## ソースコード

[packages/extension-italic/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-italic/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Italic
