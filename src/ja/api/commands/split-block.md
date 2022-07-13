# splitBlock

<!-- `splitBlock` will split the current node into two nodes at the current [NodeSelection](https://prosemirror.net/docs/ref/#state.NodeSelection). If the current selection is not splittable, the command will be ignored. -->

`splitBlock` は、現在の [NodeSelection](https://prosemirror.net/docs/ref/#state.NodeSelection) で現在のノードを2つのノードに分割します。 現在の選択が分割可能でない場合、コマンドは無視されます。

## パラメーター

`options: Record<string, any>`

<!-- * `keepMarks: boolean` - Defines if the marks should be kept or removed. Defaults to `true`. -->

* `keepMarks: boolean` - マークを保持するか削除するかを定義します。 デフォルトは `true` です。

## 使い方

```js
// split the current node and keep marks
editor.commands.splitBlock()

// split the current node and don't keep marks
editor.commands.splitBlock({ keepMarks: false })
```
