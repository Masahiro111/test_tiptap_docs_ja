---
description: Add a toolbar that pops up above the text. Great to apply inline formatting.
icon: chat-2-line
---

# Bubble Menu

[![Version](https://img.shields.io/npm/v/@tiptap/extension-bubble-menu.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-bubble-menu)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-bubble-menu.svg)](https://npmcharts.com/compare/@tiptap/extension-bubble-menu?minimal=true)

<!-- This extension will make a contextual menu appear near a selection of text. Use it to let users apply [marks](/api/marks) to their text selection. -->

この拡張機能により、選択したテキストの近くにコンテキスト メニューが表示されます。これを使用して、ユーザーがテキスト選択に [marks](/api/marks) を適用できるようにします。

<!-- As always, the markup and styling is totally up to you. -->

いつものように、マークアップとスタイリングは完全にあなた次第です。

## インストール

```bash
npm install @tiptap/extension-bubble-menu
```

## 設定

### element

<!-- The DOM element that contains your menu. -->

メニューを含む DOM 要素。

Type: `HTMLElement`

Default: `null`

### tippyOptions

<!-- Under the hood, the `BubbleMenu` uses [tippy.js](https://atomiks.github.io/tippyjs/v6/all-props/). You can directly pass options to it. -->

内部では、`BubbleMenu` は [tippy.js](https://atomics.github.io/tippyjs/v6/all-props/) を使用します。オプションを直接渡すことができます。

Type: `Object`

Default: `{}`

### pluginKey

<!-- The key for the underlying ProseMirror plugin. Make sure to use different keys if you add more than one instance. -->

基盤となる ProseMirror プラグインのキー。複数のインスタンスを追加する場合は、必ず別のキーを使用してください。

Type: `string | PluginKey`

Default: `'bubbleMenu'`

### shouldShow

<!-- A callback to control whether the menu should be shown or not. -->

メニューを表示するかどうかを制御するコールバック。

Type: `(props) => boolean`

## ソースコード

[packages/extension-bubble-menu/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-bubble-menu/)

## 使用法

### JavaScript

```js
import { Editor } from '@tiptap/core'
import BubbleMenu from '@tiptap/extension-bubble-menu'

new Editor({
  extensions: [
    BubbleMenu.configure({
      element: document.querySelector('.menu'),
    }),
  ],
})
```

### フレームワーク

https://embed.tiptap.dev/preview/Extensions/BubbleMenu

### カスタムロジック

<!-- Customize the logic for showing the menu with the `shouldShow` option. For components, `shouldShow` can be passed as a prop. -->

「shouldShow」オプションを使用して、メニューを表示するためのロジックをカスタマイズします。コンポーネントの場合、「shouldShow」を prop として渡すことができます。

```js
BubbleMenu.configure({
  shouldShow: ({ editor, view, state, oldState, from, to }) => {
    // only show the bubble menu for images and links
    return editor.isActive('image') || editor.isActive('link')
  },
})
```

### 複数のメニュー

<!-- Use multiple menus by setting an unique `pluginKey`. -->

一意の「pluginKey」を設定して、複数のメニューを使用します。

```js
import { Editor } from '@tiptap/core'
import BubbleMenu from '@tiptap/extension-bubble-menu'

new Editor({
  extensions: [
    BubbleMenu.configure({
      pluginKey: 'bubbleMenuOne',
      element: document.querySelector('.menu-one'),
    }),
    BubbleMenu.configure({
      pluginKey: 'bubbleMenuTwo',
      element: document.querySelector('.menu-two'),
    }),
  ],
})
```

<!-- Alternatively you can pass a ProseMirror `PluginKey`. -->

または、ProseMirror `PluginKey` を渡すこともできます。

```js
import { Editor } from '@tiptap/core'
import BubbleMenu from '@tiptap/extension-bubble-menu'
import { PluginKey } from 'prosemirror-state'

new Editor({
  extensions: [
    BubbleMenu.configure({
      pluginKey: new PluginKey('bubbleMenuOne'),
      element: document.querySelector('.menu-one'),
    }),
    BubbleMenu.configure({
      pluginKey: new PluginKey('bubbleMenuTwo'),
      element: document.querySelector('.menu-two'),
    }),
  ],
})
```
