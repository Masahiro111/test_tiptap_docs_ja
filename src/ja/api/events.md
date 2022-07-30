---
tableOfContents: true
---

# イベント

## はじめに

<!-- The editor fires a few different events that you can hook into. Let’s have a look at all the available events first: -->

エディターは、フックできるいくつかの異なるイベントを発生させます。まず、利用可能なすべてのイベントを見てみましょう。

## 利用可能なイベントのリスト

### beforeCreate

<!-- Before the view is created. -->

ビューが作成される前

### create

<!-- The editor is ready. -->

エディターの準備が完了したとき

### update

<!-- The content has changed. -->

内容が変更したとき

### selectionUpdate

<!-- The selection has changed. -->

選択が変更されたとき

### transaction

<!-- The editor state has changed. -->

エディターの状態が変更されたとき

### focus

<!-- The editor is focused. -->

エディターに焦点を当てたとき

### blur

<!-- The editor isn’t focused anymore. -->

エディターがフォーカスを合わせていないとき

### destroy

<!-- The editor is being destroyed. -->

エディターが破棄されたとき


## イベントリスナを登録

<!-- There are three ways to register event listeners. -->

イベントリスナーを登録する方法は3つあります。

### オプション 1: コンフィギュレーション

<!-- You can define your event listeners on a new editor instance right-away: -->

新しいエディターインスタンスでイベントリスナーをすぐに定義できます。

```js
const editor = new Editor({
  onBeforeCreate({ editor }) {
    // Before the view is created.
  },
  onCreate({ editor }) {
    // The editor is ready.
  },
  onUpdate({ editor }) {
    // The content has changed.
  },
  onSelectionUpdate({ editor }) {
    // The selection has changed.
  },
  onTransaction({ editor, transaction }) {
    // The editor state has changed.
  },
  onFocus({ editor, event }) {
    // The editor is focused.
  },
  onBlur({ editor, event }) {
    // The editor isn’t focused anymore.
  },
  onDestroy() {
    // The editor is being destroyed.
  },
})
```

### Option 2: バインディング

<!-- Or you can register your event listeners on a running editor instance: -->

または、実行中のエディターインスタンスにイベントリスナーを登録できます。

#### バインドイベントリスナー

```js
editor.on('beforeCreate', ({ editor }) => {
  // Before the view is created.
})

editor.on('create', ({ editor }) => {
  // The editor is ready.
})

editor.on('update', ({ editor }) => {
  // The content has changed.
})

editor.on('selectionUpdate', ({ editor }) => {
  // The selection has changed.
})

editor.on('transaction', ({ editor, transaction }) => {
  // The editor state has changed.
})

editor.on('focus', ({ editor, event }) => {
  // The editor is focused.
})

editor.on('blur', ({ editor, event }) => {
  // The editor isn’t focused anymore.
})

editor.on('destroy', () => {
  // The editor is being destroyed.
})
```

#### イベントリスナーのバインドを解除

<!-- If you need to unbind those event listeners at some point, you should register your event listeners with `.on()` and unbind them with `.off()` then. -->

ある時点でこれらのイベントリスナーのバインドを解除する必要がある場合は、イベントリスナーを `.on()` で登録し、 `.off()` でバインドを解除する必要があります。

```js
const onUpdate = () => {
  // The content has changed.
}

// Bind …
editor.on('update', onUpdate)

// … and unbind.
editor.off('update', onUpdate)
```

### Option 3: 拡張機能

<!-- Moving your event listeners to custom extensions (or nodes, or marks) is also possible. Here’s how that would look like: -->

イベントリスナーをカスタム拡張機能（またはノード、またはマーク）に移動することも可能です。これは次のようになります。

```js
import { Extension } from '@tiptap/core'

const CustomExtension = Extension.create({
  onBeforeCreate({ editor }) {
    // Before the view is created.
  },
  onCreate({ editor }) {
    // The editor is ready.
  },
  onUpdate({ editor }) {
    // The content has changed.
  },
  onSelectionUpdate({ editor }) {
    // The selection has changed.
  },
  onTransaction({ editor, transaction }) {
    // The editor state has changed.
  },
  onFocus({ editor, event }) {
    // The editor is focused.
  },
  onBlur({ editor, event }) {
    // The editor isn’t focused anymore.
  },
  onDestroy() {
    // The editor is being destroyed.
  },
})
```
