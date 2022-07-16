---
description: All the popular extensions in a single extension. Doesn’t get much better than this.
icon: stack-line
---

# StarterKit

[![Version](https://img.shields.io/npm/v/@tiptap/starter-kit.svg?label=version)](https://www.npmjs.com/package/@tiptap/starter-kit)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/starter-kit.svg)](https://npmcharts.com/compare/@tiptap/starter-kit?minimal=true)

<!-- The `StarterKit` is a collection of the most popular Tiptap extensions. If you’re just getting started, this extension is for you. -->

`StarterKit` は、最も人気のある Tiptap 拡張機能のコレクションです。始めたばかりの場合は、この拡張機能が最適です。

## インストール

```bash
npm install @tiptap/starter-kit
```

## 含まれている拡張機能

### Nodes

* [`Blockquote`](/api/nodes/blockquote)
* [`BulletList`](/api/nodes/bullet-list)
* [`CodeBlock`](/api/nodes/code-block)
* [`Document`](/api/nodes/document)
* [`HardBreak`](/api/nodes/hard-break)
* [`Heading`](/api/nodes/heading)
* [`HorizontalRule`](/api/nodes/horizontal-rule)
* [`ListItem`](/api/nodes/list-item)
* [`OrderedList`](/api/nodes/ordered-list)
* [`Paragraph`](/api/nodes/paragraph)
* [`Text`](/api/nodes/text)

### Marks

* [`Bold`](/api/marks/bold)
* [`Code`](/api/marks/code)
* [`Italic`](/api/marks/italic)
* [`Strike`](/api/marks/strike)

### Extensions

* [`Dropcursor`](/api/extensions/dropcursor)
* [`Gapcursor`](/api/extensions/gapcursor)
* [`History`](/api/extensions/history)

## ソースコード

[packages/starter-kit/](https://github.com/ueberdosis/tiptap/blob/main/packages/starter-kit/)

## 使い方

<!-- Pass `StarterKit` to the editor to load all included extension at once. -->

`StarterKit` をエディタに渡して、含まれているすべての拡張機能を一度にロードします。

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

const editor = new Editor({
  content: '<p>Example Text</p>',
  extensions: [
    StarterKit,
  ],
})
```

<!-- You can configure the included extensions, or even disable a few of them, like shown below. -->

以下に示すように、含まれている拡張機能を構成したり、いくつかの拡張機能を無効にしたりすることもできます。

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

const editor = new Editor({
  content: '<p>Example Text</p>',
  extensions: [
    StarterKit.configure({
      // Disable an included extension
      history: false,

      // Configure an included extension
      heading: {
        levels: [1, 2],
      },
    }),
  ],
})
```
