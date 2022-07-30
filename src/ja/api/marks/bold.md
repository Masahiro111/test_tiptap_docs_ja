---
description: Make your text bold and let it stand out.
icon: bold
---

# Bold

[![Version](https://img.shields.io/npm/v/@tiptap/extension-bold.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-bold)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-bold.svg)](https://npmcharts.com/compare/@tiptap/extension-bold?minimal=true)

<!-- Use this extension to render text in **bold**. If you pass `<strong>`, `<b>` tags, or text with inline `style` attributes setting the `font-weight` CSS rule in the editor’s initial content, they all will be rendered accordingly. -->

この拡張機能は、テキストを **太字** でレンダリングします。 `<strong>`、`<b>` タグ、またはインラインの  `style` 属性を持つテキストを渡して、エディターの初期コンテンツで `font-weight` CSS ルールを設定すると、それらはすべてそれに応じてレンダリングされます。

<!-- Type `**two asterisks**` or `__two underlines__` and it will magically transform to **bold** text while you type. -->

`** twoasterisks**` または `__twounderlines__` と入力すると、入力中に魔法のように **太字** のテキストに変換されます。

<!-- ::: warning Restrictions
The extension will generate the corresponding `<strong>` HTML tags when reading contents of the `Editor` instance. All text marked bold, regardless of the method will be normalized to `<strong>` HTML tags.
::: -->

> **警告** ： 制限
拡張機能は、`Editor` インスタンスのコンテンツを読み取るときに対応する `<strong>` HTMLタグを生成します。メソッドに関係なく、太字でマークされたすべてのテキストは、`<strong>`HTML タグに正規化されます。

## インストール

```bash
npm install @tiptap/extension-bold
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
Bold.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setBold()
<!-- Mark text as bold. -->

テキストを太字でマークします。

```js
editor.commands.setBold()
```

### toggleBold()
<!-- Toggle the bold mark. -->

太字のマークを切り替えます。

```js
editor.commands.toggleBold()
```

### unsetBold()
<!-- Remove the bold mark. -->

太字のマークを削除します。

```js
editor.commands.unsetBold()
```

## キーボードショートカット
| コマンド      | Windows/Linux      | macOS          |
| ------------ | ------------------ | -------------- |
| toggleBold() | `Ctrl` + `B` | `Cmd` + `B` |

## ソースコード

[packages/extension-bold/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-bold/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Bold
