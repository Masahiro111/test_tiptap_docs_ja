# resetAttributes

<!-- `resetAttributes` resets some of the nodes attributes back to it's default attributes. -->

`resetAttributes` は、ノード属性の一部をデフォルトの属性にリセットします。

## パラメータ

`typeOrName: string | Node`

<!-- The node that should be resetted. Can be a string or a Node. -->

リセットする必要のあるノード。 文字列またはノードにすることができます。

`attributes: string | string[]`

<!-- A string or an array of strings that defines which attributes should be reset. -->

リセットする属性を定義する文字列または文字列の配列。

## 使い方

```js
// reset the style and class attributes on the currently selected paragraph nodes
editor.commands.resetAttributes('paragraph', ['style', 'class'])
```
