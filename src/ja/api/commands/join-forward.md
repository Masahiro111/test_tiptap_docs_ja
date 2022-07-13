# joinForward

<!-- The `joinForward` command joins two nodes forwards from the current selection. If the selection is empty and at the end of a textblock, `joinForward` will try to reduce the distance between that block and the block after it. [See also](https://prosemirror.net/docs/ref/#commands.joinForward) -->

`joinBackward` コマンドは、現在の選択から2つのノードを逆方向に結合します。 選択範囲が空で、テキストブロックの先頭にある場合、 `joinBackward` は、そのブロックとその前のブロックとの間の距離を縮めようとします。

[参照](https://prosemirror.net/docs/ref/#commands.joinForward)

## 使い方
```js
editor.commands.joinForward()
```

