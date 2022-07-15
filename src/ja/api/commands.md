---
tableOfContents: true
---

# コマンド

## はじめに

<!-- The editor provides a ton of commands to programmatically add or change content or alter the selection. If you want to build your own editor you definitely want to learn more about them. -->

エディターには、コンテンツをプログラムで追加または変更したり、選択を変更したりするための多数のコマンドが用意されています。独自のエディターを作成したい場合は、間違いなくそれらについてもっと知りたいと思います。

## コマンドの実行

使用可能なすべてのコマンドには、エディターインスタンスからアクセスできます。ユーザーがボタンをクリックしたときにテキストを太字にしたい場合は次のようになります。

<!-- All available commands are accessible through an editor instance. Let’s say you want to make text bold when a user clicks on a button. That’s how that would look like: -->

```js
editor.commands.setBold()
```

<!-- While that’s perfectly fine and does make the selected bold, you’d likely want to change multiple commands in one run. Let’s have a look at how that works. -->

選択したものが太字になっていると思いますが、実際にコマンドを実行する際には **1回の実行で複数のコマンドを変更する** ことをお勧めします。それがどのように機能するかを見てみましょう。

### チェーンコマンド

ほとんどのコマンドは、1つの呼び出しに組み合わせることができます。ほとんどの場合、これは個別の関数呼び出しよりも短くなります。選択したテキストを太字にする例を次に示します。

<!-- Most commands can be combined to one call. That’s shorter than separate function calls in most cases. Here is an example to make the selected text bold: -->

```js
editor
  .chain()
  .focus()
  .toggleBold()
  .run()
```

<!-- The `.chain()` is required to start a new chain and the `.run()` is needed to actually execute all the commands in between. -->

<!-- In the example above two different commands are executed at once. When a user clicks on a button outside of the content, the editor isn’t in focus anymore. That’s why you probably want to add a `.focus()` call to most of your commands. It brings back the focus to the editor, so the user can continue to type. -->

<!-- All chained commands are kind of queued up. They are combined to one single transaction. That means, the content is only updated once, also the `update` event is only triggered once. -->

新しいチェーンを開始するには `.chain()` が必要であり、その間のすべてのコマンドを実際に実行するには `.run()` が必要です。

上記の例では、2つの異なるコマンドが同時に実行されます。ユーザーがコンテンツの外側のボタンをクリックすると、エディターはフォーカスされなくなります。そのため、ほとんどのコマンドに `.focus()` 呼び出しを追加することをお勧めします。これにより、フォーカスがエディターに戻されるため、ユーザーは入力を続けることができます。

連鎖したコマンドはすべて、一種のキューに入れられます。それらは1つの単一のトランザクションに結合されます。つまり、コンテンツは 1回だけ更新され、`update` イベントも1回だけトリガーされます。

#### カスタムコマンド内のチェーン

コマンドを連鎖させると、トランザクションは保留されます。カスタムコマンド内でコマンドをチェーンする場合は、上記のトランザクションを使用して追加する必要があります。これを行う方法は次のとおりです。

<!-- When chaining a command, the transaction is held back. If you want to chain commands inside your custom commands, you’ll need to use said transaction and add to it. Here is how you would do that: -->

```js
addCommands() {
  return {
    customCommand: attributes => ({ chain }) => {
      // Doesn’t work:
      // return editor.chain() …

      // Does work:
      return chain()
        .insertContent('foo!')
        .insertContent('bar!')
        .run()
    },
  }
}
```

### インライン コマンド

<!-- In some cases, it’s helpful to put some more logic in a command. That’s why you can execute commands in commands. I know, that sounds crazy, but let’s look at an example: -->

場合によっては、コマンドにさらにロジックを含めると便利です。そのため、コマンドでコマンドを実行できます。クレイジーに聞こえるかもしれませんが、例を見てみましょう。

```js
editor
  .chain()
  .focus()
  .command(({ tr }) => {
    // manipulate the transaction
    tr.insertText('hey, that’s cool!')

    return true
  })
  .run()
```

### コマンドのドライラン

<!-- Sometimes, you don’t want to actually run the commands, but only know if it would be possible to run commands, for example to show or hide buttons in a menu. That’s what we added `.can()` for. Everything coming after this method will be executed, without applying the changes to the document: -->

場合によっては、実際にコマンドを実行したくないが、メニューのボタンを表示または非表示にするなど、コマンドを実行できるかどうかしかわからないことがあります。そのために `.can()` を追加しました。このメソッドの後に続くものはすべて、ドキュメントに変更を適用せずに実行されます。

```js
editor
  .can()
  .toggleBold()
```

<!-- And you can use it together with `.chain()`, too. Here is an example which checks if it’s possible to apply all the commands: -->

また、`.chain()` と併用することもできます。すべてのコマンドを適用できるかどうかを確認する例を次に示します。

```js
editor
  .can()
  .chain()
  .toggleBold()
  .toggleItalic()
  .run()
```

<!-- Both calls would return `true` if it’s possible to apply the commands, and `false` in case it’s not. -->

<!-- In order to make that work with your custom commands, don’t forget to return `true` or `false`. -->

<!-- For some of your own commands, you probably want to work with the raw [transaction](/api/introduction). To make them work with `.can()` you should check if the transaction should be dispatched. Here is how you can create a simple `.insertText()` command: -->


コマンドを適用できる場合は両方の呼び出しで `true` が返され、適用できない場合は
`false` が返されます。

カスタムコマンドでそれを機能させるために、`true` または `false` を返すことを忘れないでください。

独自のコマンドのいくつかについては、生の[transaction](/api/introduction) を使用することをお勧めします。それらを `.can()` で機能させるには、トランザクションをディスパッチする必要があるかどうかを確認する必要があります。簡単な `.insertText()` コマンドを作成する方法は次のとおりです。

```js
export default (value) => ({ tr, dispatch }) => {
  if (dispatch) {
    tr.insertText(value)
  }

  return true
}
```

<!-- If you’re just wrapping another Tiptap command, you don’t need to check that, we’ll do it for you. -->

別の Tiptap コマンドをラップするだけの場合は、それをチェックする必要はありません。私たちが自動的に行います。

```js
addCommands() {
  return {
    bold: () => ({ commands }) => {
      return commands.toggleMark('bold')
    },
  }
}
```

<!-- If you’re just wrapping a plain ProseMirror command, you’ll need to pass `dispatch` anyway. Then there’s also no need to check it: -->

プレーンな ProseMirror コマンドをラップするだけの場合は、とにかく `dispatch` を渡す必要があります。次に、それをチェックする必要もありません。

```js
import { exitCode } from 'prosemirror-commands'

export default () => ({ state, dispatch }) => {
  return exitCode(state, dispatch)
}
```

### コマンドを試す

コマンドのリストを実行したいが、最初に成功したコマンドのみを適用したい場合は、`.first()` メソッドを使用してこれを行うことができます。このメソッドは次々にコマンドを実行し、最初に停止して `true` を返します。

たとえば、バックスペースキーは最初に入力ルールを元に戻そうとします。それが成功した場合、それはそこで止まります。入力ルールが適用されておらず、元に戻せない場合は、次のコマンドを実行し、選択範囲がある場合は削除します。簡略化した例を次に示します。

<!-- If you want to run a list of commands, but want only the first successful command to be applied, you can do this with the `.first()` method. This method runs one command after the other and stops at the first which returns `true`. -->

<!-- For example, the backspace key tries to undo an input rule first. If that was successful, it stops there. If no input rule has been applied and thus can’t be reverted, it runs the next command and deletes the selection, if there is one. Here is the simplified example: -->

```js
editor.first(({ commands }) => [
  () => commands.undoInputRule(),
  () => commands.deleteSelection(),
  // …
])
```

<!-- Inside of commands you can do the same thing like that: -->

コマンド内では、次のような同じことを行うことができます。

```js
export default () => ({ commands }) => {
  return commands.first([
    () => commands.undoInputRule(),
    () => commands.deleteSelection(),
    // …
  ])
}
```

## コマンドのリスト

以下にリストされているすべてのコアコマンドを見てください。彼らはあなたに何が可能かについての良い第一印象を与えるはずです。

<!-- Have a look at all of the core commands listed below. They should give you a good first impression of what’s possible. -->

### コンテンツ

| コマンド           | 説明                                              | リンク                                   |
| ------------------ | -------------------------------------------------------- | --------------------------------------- |
| clearContent()    | ドキュメント全体をクリア             | [詳細](/api/commands/clear-content)     |
| insertContent()   | 現在の位置にHTMLのノードまたは文字列を挿入 | [詳細](/api/commands/insert-content)    |
| insertContentAt() | HTMLのノードまたは文字列を特定の位置に挿入 | [詳細](/api/commands/insert-content-at) |
| setContent()      | ドキュメント全体を新しいコンテンツに置き換え          | [詳細](/api/commands/set-content)       |

### ノードとマーク

| コマンド                 | 説明                                               |                                 |
| ----------------------- | --------------------------------------------------------- | ------------------------------------ |
| clearNodes()           | ノードを単純な段落に正規化                  | [詳細](/api/commands/clear-nodes)  |
| createParagraphNear()  | 近くに段落を作成                                | [詳細](/api/commands/create-paragraph-near)  |
| deleteNode()           | ノードを削除                | [詳細](/api/commands/delete-node)  |
| extendMarkRange()      | テキスト選択を現在のマークまで拡張 | [詳細](/api/commands/extend-mark-range)  |
| exitCode()             | コードブロックを終了  | [詳細](/api/commands/exit-code)  |
| joinBackward()         | 2つのノードを逆方向に結合   | [詳細](/api/commands/join-backward)  |
| joinForward()          | 2つのノードを前方に結合          | [詳細](/api/commands/join-forward)  |
| lift()                 | 既存のラップを削除                          | [詳細](/api/commands/lift)  |
| liftEmptyBlock()       | 空の場合はブロックを持ち上げ          | [詳細](/api/commands/lift-empty-block)  |
| newlineInCode()        | コードに改行文字を追加   | [詳細](/api/commands/newline-in-code)  |
| resetAttributes()      | 一部のノードまたはマーク属性をデフォルト値にリセット | [詳細](/api/commands/reset-attributes)  |
| setMark()              | 新しい属性でマークを追加 | [詳細](/api/commands/set-mark)  |
| setNode()              | 指定された範囲をノードに置き換え | [詳細](/api/commands/set-node)  |
| splitBlock()           | 既存のノードから新しいノードをフォーク | [詳細](/api/commands/split-block)  |
| toggleMark()           | マークのオンとオフを切り替え | [詳細](/api/commands/toggle-mark)  |
| toggleNode()           | ノードを別のノードと切り替え | [詳細](/api/commands/toggle-node)  |
| toggleWrap()           | ノードを別のノードでラップするか、既存のラップを削除 | [詳細](/api/commands/toggle-wrap)  |
| undoInputRule()        | 入力ルールを元に戻す | [詳細](/api/commands/undo-input-rule)  |
| unsetAllMarks()        | 現在の選択のすべてのマークを削除します。 | [詳細]（/ api / Commands / unset-all-m | [詳細](/api/commands/unset-all-marks)  |
| unsetMark()            | 現在の選択のマークを削除 | [詳細](/api/commands/unset-mark)  |
| updateAttributes()     | ノードまたはマークの属性を更新  | [詳細](/api/commands/update-attributes)  |

### リスト

| コマンド          | 説明                                 | リンク                                |
| ---------------- | ------------------------------------------- | ------------------------------------ |
| liftListItem()  | リストアイテムをラッピングリストに持ち上げ | [詳細](/api/commands/lift-list-item)  |
| sinkListItem()  | リストアイテムを内側のリストに沈める | [詳細](/api/commands/sink-list-item)  |
| splitListItem() | 1つのリストアイテムを2つのリストアイテムに分割 | [詳細](/api/commands/split-list-item)  |
| toggleList()    | 異なるリストタイプを切り替え | [詳細](/api/commands/toggle-list)  |
| wrapInList()    | リスト内のノードをラップ | [詳細](/api/commands/wrap-in-list)  |

### 選択

| コマンド               | 選択                             | リンク                                |
| --------------------- | --------------------------------------- | ------------------------------------ |
| blur()               | エディターからフォーカスを削除 | [詳細](/api/commands/blur)  |
| deleteRange()        | 指定された範囲を削除 | [詳細](/api/commands/delete-range)  |
| deleteSelection()    | Delete the selection, if there is one.  | [詳細](/api/commands/delete-selection)  |
| enter()              | Trigger enter.                          | [詳細](/api/commands/enter)  |
| focus()              | Focus the editor at the given position. | [詳細](/api/commands/focus)  |
| keyboardShortcut()   | Trigger a keyboard shortcut.            | [詳細](/api/commands/keyboard-shortcut)  |
| scrollIntoView()     | Scroll the selection into view.         | [詳細](/api/commands/scroll-into-view)  |
| selectAll()          | Select the whole document.              | [詳細](/api/commands/select-all)  |
| selectNodeBackward() | Select a node backward.                 | [詳細](/api/commands/select-node-backward)  |
| selectNodeForward()  | Select a node forward.                  | [詳細](/api/commands/select-node-forward)  |
| selectParentNode()   | Select the parent node.                 | [詳細](/api/commands/select-parent-node)  |
| setNodeSelection()   | Creates a NodeSelection.                | [詳細](/api/commands/set-node-selection)  |
| setTextSelection()   | Creates a TextSelection.                | [詳細](/api/commands/set-text-selection)  |

<!-- ## Example use cases

### Quote a text
TODO

Add a blockquote, with a specified text, add a paragraph below, set the cursor there.

```js
// Untested, work in progress, likely to change
this.editor
  .chain()
  .focus()
  .createParagraphNear()
  .insertContent(text)
  .setBlockquote()
  .insertContent('<p></p>')
  .createParagraphNear()
  .unsetBlockquote()
  .createParagraphNear()
  .insertContent('<p></p>')
  .run()
```

Add a custom command to insert a node.
```js
addCommands() {
  return {
    insertTimecode: attributes => ({ chain }) => {
      return chain()
        .focus()
        .insertContent({
          type: 'heading',
          attrs: {
            level: 2,
          },
          content: [
            {
              type: 'text',
              text: 'heading',
            },
          ],
        })
        .insertText(' ')
        .run();
    },
  }
},
```
-->

## 独自のコマンドを書く

All extensions can add additional commands (and most do), check out the specific [documentation for the provided nodes](/api/nodes), [marks](/api/marks), and [extensions](/api/extensions) to learn more about those. And of course, you can [add your custom extensions](/guide/custom-extensions) with custom commands aswell.

すべての拡張機能は、コマンドを追加でき（ほとんどの場合、追加できます）、特定の[提供されたノードのドキュメント]（/ api / ノード）、[マーク]（/ api /マーク）、および[拡張機能]（/ api / extends）を確認できます。 それらについてもっと学ぶために。 もちろん、カスタムコマンドを使用して[カスタム拡張機能を追加]（/ guide / custom-extensions）することもできます。

But how do you write those commands? There’s a little bit to learn about that.

しかし、これらのコマンドをどのように記述しますか？ それについて学ぶことが少しあります。

:::pro Oops, this is work in progress
A well-written documentation needs attention to detail, a great understanding of the project and time to write.

::: proおっと、これは仕掛品です
適切に作成されたドキュメントには、詳細に注意を払い、プロジェクトを十分に理解し、作成する時間が必要です。

Though Tiptap is used by thousands of developers all around the world, it’s still a side project for us. Let’s change that and make open source our full-time job! With nearly 300 sponsors we are half way there already.


Tiptapは世界中の何千もの開発者によって使用されていますが、それでも私たちにとっては副次的なプロジェクトです。 それを変えて、オープンソースを私たちのフルタイムの仕事にしましょう！ 300近くのスポンサーがいるので、私たちはすでに中途半端です。

Join them and become a sponsor! Enable us to put more time into open source and we’ll fill this page and keep it up to date for you.

それらに参加してスポンサーになりましょう！ オープンソースにより多くの時間を費やせるようにしてください。このページに記入して、最新の状態に保ちます。

[Become a sponsor on GitHub →](https://github.com/sponsors/ueberdosis)
:::


