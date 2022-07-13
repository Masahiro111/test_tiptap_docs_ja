# joinBackward

<!-- The `joinBackward` command joins two nodes backwards from the current selection. If the selection is empty and at the start of a textblock, `joinBackward` will try to reduce the distance between that block and the block before it. [See also](https://prosemirror.net/docs/ref/#commands.joinBackward) -->

`joinBackward` コマンドは、現在の選択から2つのノードを逆方向に結合します。 選択範囲が空で、テキストブロックの先頭にある場合、 `joinBackward` は、そのブロックとその前のブロックとの間の距離を縮めようとします。

[参照](https://prosemirror.net/docs/ref/#commands.joinBackward)

## 使い方

```js
editor.commands.joinBackward()
```
