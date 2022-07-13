# toggleNode

<!-- `toggleNode` will a node with another node. -->

`toggleNode` は別のノードを持つノードになります。

## パラメーター

`typeOrName: string | NodeType`

<!-- The type of node that should be toggled. -->

切り替える必要のあるノードのタイプ。

`toggleTypeOrName: string | NodeType`

<!-- The type of node that should be used for the toggling. -->

トグルに使用する必要があるノードのタイプ。

`attributes?: Record<string, any>`

<!-- The attributes that should be applied to the node. **This is optional.** -->

ノードに適用する必要がある属性。 **これはオプションです。**

## 使い方

```js
// toggle a paragraph with a heading node
editor.commands.toggleNode('paragraph', 'heading', { level: 1 })

// toggle a paragraph with a image node
editor.commands.toggleNode('paragraph', 'image', { src: 'https://example.com/image.png' })
```
