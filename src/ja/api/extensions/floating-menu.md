---
description: Make a toolbar appear automagically on empty lines.
icon: menu-4-line
---

# フローティングメニュー

[![Version](https://img.shields.io/npm/v/@tiptap/extension-floating-menu.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-floating-menu)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-floating-menu.svg)](https://npmcharts.com/compare/@tiptap/extension-floating-menu?minimal=true)

<!-- This extension will make a contextual menu appear near a selection of text. -->

この拡張機能により、選択したテキストの近くにコンテキストメニューが表示されます。

## インストール

```bash
npm install @tiptap/extension-floating-menu
```

## 設定

### element

<!-- The DOM element that contains your menu. -->

メニューを含むDOM要素。

Type: `HTMLElement`

Default: `null`

### tippyOptions

<!-- Under the hood, the `FloatingMenu` uses [tippy.js](https://atomiks.github.io/tippyjs/v6/all-props/). You can directly pass options to it. -->

内部的には、`FloatingMenu` は [tippy.js](https://atomiks.github.io/tippyjs/v6/all-props/) を使用します。オプションを直接渡すことができます。

Type: `Object`

Default: `{}`

### pluginKey

<!-- The key for the underlying ProseMirror plugin. Make sure to use different keys if you add more than one instance. -->

基盤となる ProseMirror プラグインのキー。複数のインスタンスを追加する場合は、必ず異なるキーを使用してください。

Type: `string | PluginKey`

Default: `'floatingMenu'`

### shouldShow

<!-- A callback to control whether the menu should be shown or not. -->

メニューを表示するかどうかを制御するためのコールバック。

Type: `(props) => boolean`

## ソースコード

[packages/extension-floating-menu/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-floating-menu/)

## Vanilla JavaScript の使用

```js
import { Editor } from '@tiptap/core'
import FloatingMenu from '@tiptap/extension-floating-menu'

new Editor({
  extensions: [
    FloatingMenu.configure({
      element: document.querySelector('.menu'),
    }),
  ],
})
```

## フレームワークの使用

https://embed.tiptap.dev/preview/Extensions/FloatingMenu

### カスタムロジック

`shouldShow` オプションを使用してメニューを表示するためのロジックをカスタマイズします。コンポーネントの場合、`shouldShow` を小道具として渡すことができます。

<!-- Customize the logic for showing the menu with the `shouldShow` option. For components, `shouldShow` can be passed as a prop. -->

```js
FloatingMenu.configure({
  shouldShow: ({ editor, view, state, oldState }) => {
    // show the floating within any paragraph
    return editor.isActive('paragraph')
  },
})
```

### 複数のメニュー

<!-- Use multiple menus by setting an unique `pluginKey`. -->

一意の `pluginKey` を設定して、複数のメニューを使用します。

```js
import { Editor } from '@tiptap/core'
import FloatingMenu from '@tiptap/extension-floating-menu'

new Editor({
  extensions: [
    FloatingMenu.configure({
      pluginKey: 'floatingMenuOne',
      element: document.querySelector('.menu-one'),
    }),
    FloatingMenu.configure({
      pluginKey: 'floatingMenuTwo',
      element: document.querySelector('.menu-two'),
    }),
  ],
})
```

<!-- Alternatively you can pass a ProseMirror `PluginKey`. -->

または、ProseMirror `PluginKey` を渡すこともできます。

```js
import { Editor } from '@tiptap/core'
import FloatingMenu from '@tiptap/extension-floating-menu'
import { PluginKey } from 'prosemirror-state'

new Editor({
  extensions: [
    FloatingMenu.configure({
      pluginKey: new PluginKey('floatingMenuOne'),
      element: document.querySelector('.menu-one'),
    }),
    FloatingMenu.configure({
      pluginKey: new PluginKey('floatingMenuOne'),
      element: document.querySelector('.menu-two'),
    }),
  ],
})
```
