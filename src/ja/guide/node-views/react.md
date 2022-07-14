---
tableOfContents: true
---

# React を使用したノードビュー

## はじめに

<!-- Using Vanilla JavaScript can feel complex if you are used to work in React. Good news: You can use regular React components in your node views, too. There is just a little bit you need to know, but let’s go through this one by one. -->

React での作業に慣れている場合、Vanilla JavaScript の使用は複雑に感じる可能性があります。朗報：ノードビューで通常の React コンポーネントを使用することもできます。知っておくべきことが少しありますが、これを 1つずつ見ていきましょう。

## React コンポーネントのレンダリング

エディター内で React コンポーネントをレンダリングするために必要なことは次のとおりです。

<!-- Here is what you need to do to render React components inside your editor: -->

<!-- 1. [Create a node extension](/guide/custom-extensions)
2. Create a React component
3. Pass that component to the provided `ReactNodeViewRenderer`
4. Register it with `addNodeView()`
5. [Configure Tiptap to use your new node extension](/guide/configuration) -->

1. [ノード拡張を作成する](/guide/custom-extensions)
2. React コンポーネントを作成します
3. そのコンポーネントを提供された `ReactNodeViewRenderer` に渡します
4. `addNodeView()` に登録します
5. [新しいノード拡張を使用するように Tiptap を構成する](/guide/configuration)

ノード拡張は次のようになります。

<!-- This is how your node extension could look like: -->

```js
import { Node } from '@tiptap/core'
import { ReactNodeViewRenderer } from '@tiptap/react'
import Component from './Component.jsx'

export default Node.create({
  // configuration …

  addNodeView() {
    return ReactNodeViewRenderer(Component)
  },
})
```

<!-- There is a little bit of magic required to make this work. But don’t worry, we provide a wrapper component you can use to get started easily. Don’t forget to add it to your custom React component, like shown below: -->

この作業を行うには、少し魔法が必要です。ただし、心配しないでください。簡単に開始するために使用できるラッパーコンポーネントが用意されています。以下に示すように、カスタム React コンポーネントに追加することを忘れないでください。

```html
<NodeViewWrapper className="react-component">
  React Component
</NodeViewWrapper>
```

<!-- Got it? Let’s see it in action. Feel free to copy the below example to get started. -->

https://embed.tiptap.dev/preview/GuideNodeViews/ReactComponent

<!-- That component doesn’t interact with the editor, though. Time to wire it up. -->

実際の動作を見てみましょう。開始するには、以下の例をコピーしてください。

https://embed.tiptap.dev/preview/GuideNodeViews/ReactComponent

ただし、そのコンポーネントはエディタと相互作用しません。それを配線する時間。

## アクセスノードの属性

ノード拡張で使用する`ReactNodeViewRenderer` は、いくつかの非常に役立つ小道具を​​カスタム React コンポーネントに渡します。それらの1つは `node` プロップです。ノード拡張機能に `count` という名前の [属性を追加](/guide/custom-extensions#attributes) したとします（上記の例で行ったように）。次のようにアクセスできます。

<!-- The `ReactNodeViewRenderer` which you use in your node extension, passes a few very helpful props to your custom React component. One of them is the `node` prop. Let’s say you have [added an attribute](/guide/custom-extensions#attributes) named `count` to your node extension (like we did in the above example) you could access it like this: -->

```js
props.node.attrs.count
```

## ノード属性を更新する

コンポーネントに渡された `updateAttributes` プロップを使用して、ノードからノード属性を更新することもできます。更新された属性を持つオブジェクトを `updateAttributes` プロパティに渡します。

<!-- You can even update node attributes from your node, with the help of the `updateAttributes` prop passed to your component. Pass an object with updated attributes to the `updateAttributes` prop: -->

```js
export default props => {
  const increase = () => {
    props.updateAttributes({
      count: props.node.attrs.count + 1,
    })
  }

  // …
}
```

<!-- And yes, all of that is reactive, too. A pretty seemless communication, isn’t it? -->

そして、はい、それもすべて反応的です。かなり見苦しいコミュニケーションですね。

## 編集可能なコンテンツの追加

ノードビューに編集可能なコンテンツを追加するのに役立つ `NodeViewContent` と呼ばれる別のコンポーネントがあります。次に例を示します。

<!-- There is another component called `NodeViewContent` which helps you adding editable content to your node view. Here is an example: -->

```jsx
import React from 'react'
import { NodeViewWrapper, NodeViewContent } from '@tiptap/react'

export default () => {
  return (
    <NodeViewWrapper className="react-component-with-content">
      <span className="label" contentEditable={false}>React Component</span>

      <NodeViewContent className="content" />
    </NodeViewWrapper>
  )
}
```

<!-- You don’t need to add those `className` attributes, feel free to remove them or pass other class names. Try it out in the following example: -->

<!-- https://embed.tiptap.dev/preview/GuideNodeViews/ReactComponentContent -->

<!-- Keep in mind that this content is rendered by Tiptap. That means you need to tell what kind of content is allowed, for example with `content: 'inline*'` in your node extension (that’s what we use in the above example). -->

<!-- The `NodeViewWrapper` and `NodeViewContent` components render a `<div>` HTML tag (`<span>` for inline nodes), but you can change that. For example `<NodeViewContent as="p">` should render a paragraph. One limitation though: That tag must not change during runtime. -->

これらの `className` 属性を追加する必要はありません。自由に削除するか、他のクラス名を渡してください。次の例で試してみてください。

https://embed.tiptap.dev/preview/GuideNodeViews/ReactComponentContent

このコンテンツは Tiptap によってレンダリングされることに注意してください。つまり、許可されているコンテンツの種類を指定する必要があります。たとえば、ノード拡張に `content: 'inline *'` を使用します（上記の例ではこれを使用しています）。

`NodeViewWrapper` および `NodeViewContent` コンポーネントは `<div>` HTML タグ（インラインノードの場合は `<span>`）をレンダリングしますが、これは変更できます。たとえば、 `<NodeViewContent as="p">` は段落をレンダリングする必要があります。ただし、1つの制限：そのタグは実行時に変更してはなりません。

## 利用可能なすべてのプロップ

これがあなたが期待できるプロップの完全なリストです：

<!-- Here is the full list of what props you can expect: -->

### editor

<!-- The editor instance -->

エディターインスタンス

### node

<!-- The current node -->

現在のノード

### decorations

<!-- An array of decorations -->

装飾の配列

### selected

<!-- `true` when there is a `NodeSelection` at the current node view -->

現在のノードビューに `NodeSelection` がある場合は `true`

### extension

<!-- Access to the node extension, for example to get options -->

たとえばオプションを取得するためのノード拡張へのアクセス

### getPos()

<!-- Get the document position of the current node -->

現在のノードのドキュメント位置を取得します

### updateAttributes()

<!-- Update attributes of the current node -->

現在のノードの属性を更新します

### deleteNode()

<!-- Delete the current node -->

現在のノードを削除します

## Dragging

<!-- To make your node views draggable, set `draggable: true` in the extension and add `data-drag-handle` to the DOM element that should function as the drag handle. -->

ノードビューをドラッグ可能にするには、拡張機能で「draggable: true」を設定し、ドラッグハンドルとして機能する DOM 要素に「data-drag-handle」を追加します。

https://embed.tiptap.dev/preview/GuideNodeViews/DragHandle
