---
description: Add an image (but a beautiful one), when words aren’t enough.
icon: image-line
---

# Image
[![Version](https://img.shields.io/npm/v/@tiptap/extension-image.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-image)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-image.svg)](https://npmcharts.com/compare/@tiptap/extension-image?minimal=true)

Use this extension to render `<img>` HTML tags. By default, those images are blocks. If you want to render images in line with text  set the `inline` option to `true`.

:::warning Restrictions
This extension does only the rendering of images. It doesn’t upload images to your server, that’s a whole different story.
:::


この拡張機能を使用して、`<img>`HTMLタグをレンダリングします。デフォルトでは、これらの画像はブロックです。テキストに沿って画像をレンダリングする場合は、`inline`オプションを`true`に設定します。

:::警告の制限
この拡張機能は、画像のレンダリングのみを行います。サーバーに画像をアップロードしません。これはまったく別の話です。
：：：

## Installation
```bash
npm install @tiptap/extension-image
```

## Settings

### inline
Renders the image node inline, for example in a paragraph tag: `<p><img src="spacer.gif"></p>`. By default images are on the same level as paragraphs.

It totally depends on what kind of editing experience you’d like to have, but can be useful if you (for example) migrate from Quill to Tiptap.

画像ノードをインラインでレンダリングします。たとえば、段落タグ `<p> <img src =" spacer.gif "></p>`を使用します。デフォルトでは、画像は段落と同じレベルにあります。

必要な編集エクスペリエンスの種類によって異なりますが、たとえば、QuillからTiptapに移行する場合に役立ちます。

Default: `false`

```js
Image.configure({
  inline: true,
})
```

### allowBase64
Allow images to be parsed as base64 strings `<img src="data:image/jpg;base64...">`.

画像をbase64文字列`<imgsrc = "data：image / jpg;base64...">`として解析できるようにします。

Default: `false`

```js
Image.configure({
  allowBase64: true,
})
```

### HTMLAttributes
Custom HTML attributes that should be added to the rendered HTML tag.

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
Image.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## Commands

### setImage()
Makes the current node an image.

現在のノードをイメージにします。

```js
editor.commands.setImage({ src: 'https://example.com/foobar.png' })
editor.commands.setImage({ src: 'https://example.com/foobar.png', alt: 'A boring example image', title: 'An example' })
```

## Source code
[packages/extension-image/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-image/)

## Usage
https://embed.tiptap.dev/preview/Nodes/Image
