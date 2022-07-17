---
description: Cut through the words you wrote if you’re too afraid to delete it.
icon: strikethrough
---

# Strike

[![Version](https://img.shields.io/npm/v/@tiptap/extension-strike.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-strike)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-strike.svg)](https://npmcharts.com/compare/@tiptap/extension-strike?minimal=true)

Use this extension to render ~~striked text~~. If you pass `<s>`, `<del>`, `<strike>` tags, or text with inline `style` attributes setting `text-decoration: line-through` in the editor’s initial content, they all will be rendered accordingly.

Type <code>&Tilde;&Tilde;text between tildes&Tilde;&Tilde;</code> and it will be magically ~~striked through~~ while you type.

::: warning Restrictions
The extension will generate the corresponding `<s>` HTML tags when reading contents of the `Editor` instance. All text striked through, regardless of the method will be normalized to `<s>` HTML tags.
:::

この拡張機能を使用して、~~打たれたテキスト~~をレンダリングします。 `<s>`、 `<del>`、 `<strike>`タグ、またはインラインの `style`属性で`text-decoration：line-through`を設定するテキストをエディターの初期コンテンツに渡すと、それらはすべて次のようになります。それに応じてレンダリングされます。

<code>＆Tilde;＆Tilde; text between tildes＆Tilde;＆Tilde; </ code>と入力すると、入力中に魔法のように~~打たれます~~。

：：：警告制限
拡張機能は、`Editor`インスタンスのコンテンツを読み取るときに対応する`<s>`HTMLタグを生成します。メソッドに関係なく、すべてのテキストは`<s>`HTMLタグに正規化されます。
：：：

## インストール

```bash
npm install @tiptap/extension-strike
```

## 設定

### HTMLAttributes

Custom HTML attributes that should be added to the rendered HTML tag.

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
Strike.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setStrike()

Mark text as striked.

テキストをストライクとしてマークします。

```js
editor.commands.setStrike()
```

### toggleStrike()

Toggle strike mark.

ストライクマークを切り替えます。

```js
editor.commands.toggleStrike()
```

### unsetStrike()

Remove strike mark.

ストライクマークを削除します。

```js
editor.commands.unsetStrike()
```

## キーボード ショートカット
| コマンド | Windows/Linux                   | macOS                       |
| -------------- | ------------------------------- | --------------------------- |
| toggleStrike() | `Control`&nbsp;`Shift`&nbsp;`X` | `Cmd`&nbsp;`Shift`&nbsp;`X` |

## ソースコード
[packages/extension-strike/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-strike/)

## 使い方
https://embed.tiptap.dev/preview/Marks/Strike
