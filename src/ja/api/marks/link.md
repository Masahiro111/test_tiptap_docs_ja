---
description: Link it, link it good, link it real good (and don’t forget the href).
icon: link
---

# Link

[![Version](https://img.shields.io/npm/v/@tiptap/extension-link.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-link)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-link.svg)](https://npmcharts.com/compare/@tiptap/extension-link?minimal=true)

<!-- The Link extension adds support for `<a>` tags to the editor. The extension is headless too, there is no actual UI to add, modify or delete links. The usage example below uses the native JavaScript prompt to show you how that could work. -->

<!-- In a real world application, you would probably add a more sophisticated user interface. -->

<!-- Pasted URLs will be transformed to links automatically. -->

Link 拡張機能は、エディターに `<a>` タグのサポートを追加します。拡張機能もヘッドレスであり、リンクを追加、変更、または削除するための実際のUIはありません。以下の使用例では、ネイティブ JavaScript プロンプトを使用して、それがどのように機能するかを示しています。

実際のアプリケーションでは、おそらくより洗練されたユーザーインターフェイスを追加します。

貼り付けられた URL は自動的にリンクに変換されます。

## インストール

```bash
npm install @tiptap/extension-link
```

## 設定

### protocols

<!-- Additional custom protocols you would like to be recognized as links. -->

リンクとして認識したい追加のカスタムプロトコル。

Default: `[]`

```js
Link.configure({
  protocols: ['ftp', 'mailto'],
})
```

### autolink

<!-- If enabled, it adds links as you type. -->

有効にすると、入力時にリンクが追加されます。

Default: `true`

```js
Link.configure({
  autolink: false,
})
```

### openOnClick

<!-- If enabled, links will be opened on click. -->

有効にすると、クリックするとリンクが開きます。

Default: `true`

```js
Link.configure({
  openOnClick: false,
})
```

### linkOnPaste

<!-- Adds a link to the current selection if the pasted content only contains an url. -->

貼り付けたコンテンツに URL のみが含まれている場合は、現在の選択へのリンクを追加します。

Default: `true`

```js
Link.configure({
  linkOnPaste: false,
})
```

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Link.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### validate

<!-- A function that validates every autolinked link. If it exists, it will be called with the link href as argument. If it returns `false`, the link will be removed. -->

<!-- Can be used to set rules for example excluding or including certain domains, tlds, etc. -->

自動リンクされたすべてのリンクを検証する関数。存在する場合は、リンク `href` を引数として呼び出されます。 `false` を返す場合、リンクは削除されます。

たとえば、特定のドメイン、TLD などを除外または含めるルールを設定するために使用できます。

```js
// only autolink urls with a protocol
Link.configure({
  validate: href => /^https?:\/\//.test(href),
})
```

## コマンド

### setLink()

<!-- Links the selected text. -->

選択したテキストをリンクします。

```js
editor.commands.setLink({ href: 'https://example.com' })
editor.commands.setLink({ href: 'https://example.com', target: '_blank' })
```

### toggleLink()

<!-- Adds or removes a link from the selected text. -->

選択したテキストにリンクを追加または削除します。

```js
editor.commands.toggleLink({ href: 'https://example.com' })
editor.commands.toggleLink({ href: 'https://example.com', target: '_blank' })
```

### unsetLink()

<!-- Removes a link. -->

リンクを削除します。

```js
editor.commands.unsetLink()
```

## キーボードショートカット

> 警告：キーボードショートカットはありません
この拡張機能は、特定のキーボードショートカットをバインドしません。ただし、おそらく `Mod-k` でカスタム UI を開くでしょう。

<!-- :::warning Doesn’t have a keyboard shortcut
This extension doesn’t bind a specific keyboard shortcut. You would probably open your custom UI on `Mod-k` though.
::: -->

## 現在の値の取得

[`getAttributes`](/api/editor#get-attributes) を使用して、現在設定されている属性（たとえば、どの href なのか）を見つけることができることをご存知ですか？ [コマンド](/api/commands)（状態を変更する）と混同しないでください。これは単なるメソッドです。これがどのように見えるかです：

<!-- Did you know that you can use [`getAttributes`](/api/editor#get-attributes) to find out which attributes, for example which href, is currently set? Don’t confuse it with a [command](/api/commands) (which changes the state), it’s just a method. Here is how that could look like: -->

```js
this.editor.getAttributes('link').href
```

## ソースコード

[packages/extension-link/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-link/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Link
