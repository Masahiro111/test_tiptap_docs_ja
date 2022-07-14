---
tableOfContents: true
---

# JavaScript を使用したノードビュー

## はじめに

<!-- Using frameworks like Vue or React can feel too complex, if you’re used to work without those two. Good news: You can use Vanilla JavaScript in your node views. There is just a little bit you need to know, but let’s go through this one by one. -->

Vue や React のようなフレームワークを使用することは、これら 2つなしで作業することに慣れている場合、複雑すぎると感じる可能性があります。朗報：ノードビューで Vanilla JavaScript を使用できます。知っておくべきことが少しありますが、これを1つずつ見ていきましょう。


## JavaScript を使用してノードビューのレンダリング

<!-- Here is what you need to do to render a node view inside your editor: -->

エディター内でノードビューをレンダリングするために必要なことは次のとおりです。

<!-- 1. [Create a node extension](/guide/custom-extensions)
2. Register a new node view with `addNodeView()`
3. Write your render function
4. [Configure Tiptap to use your new node extension](/guide/configuration) -->

1. [ノード拡張を作成する](/guide/custom-extensions)
2.新しいノードビューを `addNodeView()` に登録します
3.レンダリング関数を記述します
4. [新しいノード拡張を使用するように Tiptap を構成する](/guide/configuration)

ノード拡張は次のようになります。

<!-- This is how your node extension could look like: -->

```js
import { Node } from '@tiptap/core'
import Component from './Component.vue'

export default Node.create({
  // configuration …

  addNodeView() {
    return ({ editor, node, getPos, HTMLAttributes, decorations, extension }) => {
      const dom = document.createElement('div')

      dom.innerHTML = 'Hello, I’m a node view!'

      return {
        dom,
      }
    }
  },
})
```

<!-- Got it? Let’s see it in action. Feel free to copy the below example to get started. -->

実際の動作を見てみましょう。開始するには、以下の例をコピーしてください。

https://embed.tiptap.dev/preview/GuideNodeViews/JavaScript

That node view even interacts with the editor. Time to see how that is wired up.

そのノードビューは、エディターとさえ相互作用します。それがどのように配線されているかを見てみましょう。

## アクセスノードの属性

エディターは、いくつかの役立つものをレンダリング関数に渡します。それらの1つは `node` プロップです。これにより、ノードビューでノード属性にアクセスできます。ノード拡張機能に `count` という名前の[属性を追加](/guide/custom-extensions#attributes) したとします。次のように属性にアクセスできます。

<!-- The editor passes a few helpful things to your render function. One of them is the `node` prop. This one enables you to access node attributes in your node view. Let’s say you have [added an attribute](/guide/custom-extensions#attributes) named `count` to your node extension. You could access the attribute like this: -->

```js
addNodeView() {
  return ({ node }) => {
    console.log(node.attrs.count)

    // …
  }
}
```


## ノード属性の更新

レンダリング関数に渡された `getPos` プロップを使用して、ノードビューからノード属性を更新することもできます。更新された属性のオブジェクトを使用して、新しいトランザクションをディスパッチします。

<!-- You can even update node attributes from your node view, with the help of the `getPos` prop passed to your render function. Dispatch a new transaction with an object of the updated attributes: -->

```js
addNodeView() {
  return ({ editor, node, getPos }) => {
    const { view } = editor

    // Create a button …
    const button = document.createElement('button')
    button.innerHTML = `This button has been clicked ${node.attrs.count} times.`

    // … and when it’s clicked …
    button.addEventListener('click', () => {
      if (typeof getPos === 'function') {
        // … dispatch a transaction, for the current position in the document …
        view.dispatch(view.state.tr.setNodeMarkup(getPos(), undefined, {
          count: node.attrs.count + 1,
        }))

        // … and set the focus back to the editor.
        editor.commands.focus()
      }
    })

    // …
  }
}
```

Does seem a little bit too complex? Consider using [React](/guide/node-views/react) or [Vue](/guide/node-views/vue), if you have one of those in your project anyway. It get’s a little bit easier with those two.

少し複雑すぎるように見えますか？とにかくプロジェクトにこれらのいずれかがある場合は、[React](/guide/node-views/react) または、[Vue](/guide/node-views/vue) の使用を検討してください。この 2つを使用すると、少し簡単になります。

## 編集可能なコンテンツの追加

編集可能なコンテンツをノードビューに追加するには、コンテンツのコンテナ要素である `contentDOM` を渡す必要があります。編集不可および編集可能なテキストコンテンツを含むノードビューの簡略化されたバージョンを次に示します。

<!-- To add editable content to your node view, you need to pass a `contentDOM`, a container element for the content. Here is a simplified version of a node view with non-editable and editable text content: -->

```js
// Create a container for the node view
const dom = document.createElement('div')

// Give other elements containing text `contentEditable = false`
const label = document.createElement('span')
label.innerHTML = 'Node view'
label.contentEditable = false

// Create a container for the content
const content = document.createElement('div')

// Append all elements to the node view container
dom.append(label, content)

return {
  // Pass the node view container …
  dom,
  // … and the content container:
  contentDOM: content,
}
```

<!-- Got it? You’re free to do anything you like, as long as you return a container for the node view and another one for the content. Here is the above example in action: -->

<!-- https://embed.tiptap.dev/preview/GuideNodeViews/JavaScriptContent -->

<!-- Keep in mind that this content is rendered by Tiptap. That means you need to tell what kind of content is allowed, for example with `content: 'inline*'` in your node extension (that’s what we use in the above example). -->

ノードビュー用のコンテナとコンテンツ用のコンテナを返す限り、好きなことを自由に行うことができます。上記の実際の例は次のとおりです。

https://embed.tiptap.dev/preview/GuideNodeViews/JavaScriptContent

このコンテンツは Tiptap によってレンダリングされることに注意してください。つまり、許可されているコンテンツの種類を指定する必要があります。たとえば、ノード拡張に `content: 'inline*'` を使用します（上記の例ではこれを使用しています）。
