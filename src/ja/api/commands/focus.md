# focus

<!-- This command sets the focus back to the editor. -->

<!-- When a user clicks on a button outside the editor, the browser sets the focus to that button. In most scenarios you want to focus the editor then again. That’s why you’ll see that in basically every demo here. -->

このコマンドは、フォーカスをエディターに戻します。

ユーザーがエディターの外側のボタンをクリックすると、ブラウザーはそのボタンにフォーカスを設定します。ほとんどのシナリオでは、エディターに再び焦点を合わせたいと思います。そのため、基本的にここのすべてのデモでそれを確認できます。

参照 : [setTextSelection](/api/commands/set-text-selection), [blur](/api/commands/blur)

## パラメータ

`position: 'start' | 'end' | 'all' | number | boolean | null (false)`

<!-- By default, it’s restoring the cursor position (and text selection). Pass a position to move the cursor too. -->

デフォルトでは、カーソル位置（およびテキスト選択）が復元されます。カーソルを移動する位置も渡します。

`options: { scrollIntoView: boolean }`

<!-- Defines whether to scroll to the cursor when focusing. Defaults to `true`. -->

フォーカス時にカーソルまでスクロールするかどうかを定義します。デフォルトは `true` です。

## 使い方

```js
// Set the focus to the editor
editor.commands.focus()

// Set the cursor to the first position
editor.commands.focus('start')

// Set the cursor to the last position
editor.commands.focus('end')

// Selects the whole document
editor.commands.focus('all')

// Set the cursor to position 10
editor.commands.focus(10)
```
