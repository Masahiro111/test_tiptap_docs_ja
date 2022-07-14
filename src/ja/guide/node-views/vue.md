---
tableOfContents: true
---

# Node views with Vue

## はじめに

<!-- Using Vanilla JavaScript can feel complex if you are used to work in Vue. Good news: You can use regular Vue components in your node views, too. There is just a little bit you need to know, but let’s go through this one by one. -->

Vue での作業に慣れている場合、Vanilla JavaScript の使用は複雑に感じる可能性があります。 朗報：ノードビューで通常の Vue コンポーネントを使用することもできます。 知っておくべきことが少しありますが、これを1つずつ見ていきましょう。

## Vue コンポーネントをレンダリング

<!-- Here is what you need to do to render Vue components inside your editor: -->

エディター内で Vue コンポーネントをレンダリングするために必要なことは次のとおりです。

<!-- 1. [Create a node extension](/guide/custom-extensions)
2. Create a Vue component
3. Pass that component to the provided `VueNodeViewRenderer`
4. Register it with `addNodeView()`
5. [Configure Tiptap to use your new node extension](/guide/configuration) -->

1. [ノード拡張を作成する](/guide/custom-extensions)
2. Vue コンポーネントを作成します
3. そのコンポーネントを提供された `VueNodeViewRenderer` に渡します
4. `addNodeView()` に登録します
5. [新しいノード拡張を使用するように Tiptap を構成する](/guide/configuration)

ノード拡張は次のようになります。

<!-- This is how your node extension could look like: -->

```js
import { Node } from '@tiptap/core'
import { VueNodeViewRenderer } from '@tiptap/vue-2'
import Component from './Component.vue'

export default Node.create({
  // configuration …

  addNodeView() {
    return VueNodeViewRenderer(Component)
  },
})
```

<!-- There is a little bit of magic required to make this work. But don’t worry, we provide a wrapper component you can use to get started easily. Don’t forget to add it to your custom Vue component, like shown below: -->

この作業を行うには、少し魔法が必要です。 ただし、心配しないでください。簡単に開始するために使用できるラッパーコンポーネントが用意されています。 以下に示すように、カスタムVueコンポーネントに追加することを忘れないでください。

```html
<template>
  <node-view-wrapper>
    Vue Component
  </node-view-wrapper>
</template>
```

<!-- Got it? Let’s see it in action. Feel free to copy the below example to get started. -->

次に実際の動作を見てみましょう。 開始するには、以下の例をコピーしてください。

https://embed.tiptap.dev/preview/GuideNodeViews/VueComponent

<!-- That component doesn’t interact with the editor, though. Time to wire it up. -->

ただし、そのコンポーネントはエディタと相互作用しません。 それを配線する時間。

## アクセスノードの属性

<!-- The `VueNodeViewRenderer` which you use in your node extension, passes a few very helpful props to your custom Vue component. One of them is the `node` prop. Add this snippet to your Vue component to directly access the node: -->

ノード拡張で使用する`VueNodeViewRenderer` は、いくつかの非常に役立つ小道具をカスタムVueコンポーネントに渡します。 それらの1つは `node` プロップです。 このスニペットを Vue コンポーネントに追加して、ノードに直接アクセスします。

```js
props: {
  node: {
    type: Object,
    required: true,
  },
},
```

<!-- That enables you to access node attributes in your Vue component. Let’s say you have [added an attribute](/guide/custom-extensions#attributes) named `count` to your node extension (like we did in the above example) you could access it like this: -->

これにより、Vue コンポーネントのノード属性にアクセスできます。ノード拡張機能に `count` という名前の[属性を追加](/guide/custom-extensions#attributes) したとします（上記の例で行ったように）。次のようにアクセスできます。

```js
this.node.attrs.count
```

## ノード属性を更新する

コンポーネントに渡された `updateAttributes` プロップを使用して、ノードからノード属性を更新することもできます。このスニペットをコンポーネントに追加するだけです。

<!-- You can even update node attributes from your node, with the help of the `updateAttributes` prop passed to your component. Just add this snippet to your component: -->

```js
props: {
  updateAttributes: {
    type: Function,
    required: true,
  },
},
```

<!-- Pass an object with updated attributes to the function: -->

更新された属性を持つオブジェクトを関数に渡します。

```js
this.updateAttributes({
  count: this.node.attrs.count + 1,
})
```

<!-- And yes, all of that is reactive, too. A pretty seemless communication, isn’t it? -->

そして、はい、それもすべて反応的です。かなり見苦しいコミュニケーションですね。

## 編集可能なコンテンツを追加する

ノードビューに編集可能なコンテンツを追加するのに役立つ `NodeViewContent` と呼ばれる別のコンポーネントがあります。次に例を示します。

<!-- There is another component called `NodeViewContent` which helps you adding editable content to your node view. Here is an example: -->

```html
<template>
  <node-view-wrapper class="dom">
    <node-view-content class="content-dom" />
  </node-view-wrapper>
</template>

<script>
import { NodeViewWrapper, NodeViewContent } from '@tiptap/vue-2'

export default {
  components: {
    NodeViewWrapper,
    NodeViewContent,
  },
}
</script>
```

<!-- You don’t need to add those `class` attributes, feel free to remove them or pass other class names. Try it out in the following example: -->

これらの `class` 属性を追加したり、削除したり、他のクラス名を渡したりする必要はありません。次の例で試してみてください。

https://embed.tiptap.dev/preview/GuideNodeViews/VueComponentContent

<!-- Keep in mind that this content is rendered by Tiptap. That means you need to tell what kind of content is allowed, for example with `content: 'inline*'` in your node extension (that’s what we use in the above example). -->

このコンテンツはTiptapによってレンダリングされることに注意してください。つまり、許可されているコンテンツの種類を指定する必要があります。たとえば、ノード拡張に `content: 'inline *'` を使用します（上記の例ではこれを使用しています）。

<!-- The `NodeViewWrapper` and `NodeViewContent` components render a `<div>` HTML tag (`<span>` for inline nodes), but you can change that. For example `<node-view-content as="p">` should render a paragraph. One limitation though: That tag must not change during runtime. -->

`NodeViewWrapper` および `NodeViewContent` コンポーネントは `<div>` HTML タグ（インラインノードの場合は `<span>`）をレンダリングしますが、これは変更できます。たとえば、  `<node-view-content as="p">` は段落をレンダリングする必要があります。ただし、1つの制限：そのタグは実行時に変更してはなりません。

## 利用可能なすべてのプロップ

高度なユースケースでは、コンポーネントにさらにいくつかのプロップを渡します。

<!-- For advanced use cases, we pass a few more props to the component. -->

### editor

<!-- The editor instance. -->

エディターインスタンス。

### node

<!-- Access the current node. -->

現在のノードにアクセスします。

### decorations

<!-- An array of decorations. -->

装飾の配列。

### selected

<!-- `true` when there is a `NodeSelection` at the current node view. -->

現在のノードビューに `NodeSelection` がある場合は `true`。

### extension

<!-- Access to the node extension, for example to get options. -->

たとえば、オプションを取得するためのノード拡張へのアクセス。

### getPos()

<!-- Get the document position of the current node. -->

現在のノードのドキュメント位置を取得します。

### updateAttributes()

<!-- Update attributes of the current node. -->

現在のノードの属性を更新します。

### deleteNode()

<!-- Delete the current node. -->

<!-- Here is the full list of what props you can expect: -->

現在のノードを削除します。

これがあなたが期待できる小道具の完全なリストです

```html
<template>
  <node-view-wrapper />
</template>

<script>
import { NodeViewWrapper } from '@tiptap/vue-2'

export default {
  components: {
    NodeViewWrapper,
  },

  props: {
    // the editor instance
    editor: {
      type: Object,
    },

    // the current node
    node: {
      type: Object,
    },

    // an array of decorations
    decorations: {
      type: Array,
    },

    // `true` when there is a `NodeSelection` at the current node view
    selected: {
      type: Boolean,
    },

    // access to the node extension, for example to get options
    extension: {
      type: Object,
    },

    // get the document position of the current node
    getPos: {
      type: Function,
    },

    // update attributes of the current node
    updateAttributes: {
      type: Function,
    },

    // delete the current node
    deleteNode: {
      type: Function,
    },
  },
}
</script>
```

<!-- If you just want to have all (and TypeScript support) you can import all props like that: -->

すべて（および TypeScript サポート）が必要な場合は、次のようなすべての小道具をインポートできます。

```js
// Vue 3
import { defineComponent } from 'vue'
import { nodeViewProps } from '@tiptap/vue-3'
export default defineComponent({
  props: nodeViewProps,
})

// Vue 2
import Vue from 'vue'
import { nodeViewProps } from '@tiptap/vue-2'
export default Vue.extend({
  props: nodeViewProps,
})
```

## Dragging

<!-- To make your node views draggable, set `draggable: true` in the extension and add `data-drag-handle` to the DOM element that should function as the drag handle. -->

ノードビューをドラッグ可能にするには、拡張機能で「draggable: true」を設定し、ドラッグハンドルとして機能する DOM 要素に「data-drag-handle」を追加します。

https://embed.tiptap.dev/preview/GuideNodeViews/DragHandle
