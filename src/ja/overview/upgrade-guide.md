---
tableOfContents: true
---

# アップグレードガイド

## はじめに

<!-- First of all, Tiptap v1 isn’t supported anymore and won’t receive any further updates. -->

<!-- Yes, it’s tedious work to upgrade your favorite text editor to a new API, but we made sure you’ve got enough reasons to upgrade to the newest version. -->

まず、Tiptap v1 はサポートされなくなり、それ以上のアップデートは受信されなくなります。

お気に入りのテキストエディタを新しいAPIにアップグレードするのは面倒な作業ですが、最新バージョンにアップグレードする十分な理由があることを確認しました。

<!-- * Autocompletion in your IDE (thanks to TypeScript)
* Amazing documentation with 100+ pages and 100+ interactive examples
* Active development, new features in the making, new releases every week
* Tons of new extensions
* Well-tested code base -->

* IDEでのオートコンプリート（TypeScriptのおかげで）
* 100以上のページと100以上のインタラクティブな例を含むすばらしいドキュメント
* 活発な開発、作成中の新機能、毎週の新リリース
* たくさんの新しい拡張機能
* 十分にテストされたコードベース

<!-- The new API will look pretty familiar to you, but there are a ton of changes though. To make the upgrade a little bit easier, here is everything you need to know: -->

新しい API は見覚えがありますが、多くの変更があります。アップグレードを少し簡単にするために、知っておく必要のあるすべてがここにあります。

## Tiptap v1をアンインストールします

<!-- The whole package structure has changed, we even moved to another npm namespace, so you’ll need to remove the old version entirely before upgrading to Tiptap 2. -->

<!-- Otherwise you’ll run into an exception, for example “looks like multiple versions of prosemirror-model were loaded”. -->

パッケージ構造全体が変更され、別の npm 名前空間に移動したため、Tiptap 2 にアップグレードする前に古いバージョンを完全に削除する必要があります。

そうしないと「 "looks like multiple versions of prosemirror-model were loaded" (複数のバージョンのprosemirror-model がロードされたように見えます) 」などの例外が発生します。

```bash
npm uninstall tiptap tiptap-commands tiptap-extensions tiptap-utils
```

## Tiptap v2 をインストールします

<!-- Once you have uninstalled the old version of Tiptap, install the new Vue 2 package and the starter kit: -->

古いバージョンの Tiptap をアンインストールしたら、新しい Vue2 パッケージとスターターキットをインストールします。

```bash
npm install @tiptap/vue-2 @tiptap/starter-kit
```

## Tiptap v2 を最新の状態に保つ

Tiptapのアップデートを常にリリースしています。

<!-- We are constantly releasing updates to Tiptap. -->

残念ながら、npm には依存関係を簡単に更新する統合ツールはありませんが、`npm-check` パッケージを使用できます。

<!-- Unfortunately, for npm there is no integrated tool to easily update your dependencies, but you can use the `npm-check` package: -->

```bash
npm install -g npm-check
npm-check -u
```

## ドキュメント、テキスト、段落の拡張子を明示的に登録する

tiptap 1は、デフォルト設定の `useBuiltInExtensions: true`を使用して、いくつかの必要な拡張機能を非表示にしようとしました。その設定は削除されており、すべての拡張機能をインポートする必要があります。少なくとも [`Document`](/api/nodes/document) 、[`Paragraph`](/api/nodes/paragraph) と [`Text`](/api/nodes/text) 拡張子を明示的にインポートしてください。

<!-- tiptap 1 tried to hide a few required extensions from you with the default setting `useBuiltInExtensions: true`. That setting has been removed and you’re required to import all extensions. Be sure to explicitly import at least the [`Document`](/api/nodes/document), [`Paragraph`](/api/nodes/paragraph) and [`Text`](/api/nodes/text) extensions. -->

```js
import Document from '@tiptap/extension-document'
import Paragraph from '@tiptap/extension-paragraph'
import Text from '@tiptap/extension-text'

new Editor({
  extensions: [
    Document,
    Paragraph,
    Text,
    // all your other extensions
  ],
})
```

And we removed some settings: `dropCursor`, `enableDropCursor`, and `enableGapCursor`. Those are separate extensions now: [`Dropcursor`](/api/extensions/dropcursor) and [`Gapcursor`](/api/extensions/gapcursor). You probably want to load them, but if you don’t, just ignore this.

そして、いくつかの設定を削除しました： `dropCursor`、` enableDropCursor`、および`enableGapCursor`。 これらは現在、別々の拡張機能です：[`Dropcursor`]（/ api / extends / dropcursor）と[`Gapcursor`]（/ api / extends / gapcursor）。 おそらくそれらをロードしたいのですが、ロードしない場合は、これを無視してください。

## 拡張機能の新しい名前

lowerCamelCase に切り替えたため、多くのタイプ名が変更されました。 コンテンツを JSON として保存した場合は、コンテンツをループして名前を変更する必要があります。 すみません。

<!-- We switched to lowerCamelCase, so there’s a lot type names that changed. If you stored your content as JSON you need to loop through it and rename them. Sorry for that one. -->

| 古い名前              | 新しい名前               |
| --------------------- | ---------------------- |
| ~~`bullet_list`~~     | `bulletList`           |
| ~~`code_block`~~      | `codeBlock`            |
| ~~`hard_break`~~      | `hardBreak`            |
| ~~`horizontal_rule`~~ | `horizontalRule`       |
| ~~`list_item`~~       | `listItem`             |
| ~~`ordered_list`~~    | `orderedList`          |
| ~~`table_cell`~~      | `tableCell`            |
| ~~`table_header`~~    | `tableHeader`          |
| ~~`table_row`~~       | `tableRow`             |
| ~~`todo_list`~~       | `taskList` (new name!) |
| ~~`todo_item`~~       | `taskItem` (new name!) |

## 削除されたメソッド

`state()` メソッドを削除しました。 心配はいりませんが、`editor.state` から引き続き利用できます。

<!-- We removed the `.state()` method. No worries though, it’s still available through `editor.state`. -->

## 新しい拡張 API

プロジェクト用にいくつかのカスタム拡張機能を構築した場合は、新しいAPIに合うようにそれらを書き直す必要があります。 心配はいりませんが、多くの作業を続けることができます。 `schema`、`commands`、`keys`、` inputRules`、および  `pasteRules` はすべて、以前と同じように機能します。 登録方法が違うだけです。

<!-- In case you’ve built some custom extensions for your project, you’re required to rewrite them to fit the new API. No worries, you can keep a lot of your work though. The `schema`, `commands`, `keys`, `inputRules` and `pasteRules` all work like they did before. It’s just different how you register them. -->

```js
import { Node } from '@tiptap/core'

const CustomExtension = Node.create({
  name: 'custom_extension',
  addOptions() {
    …
  },
  addAttributes() {
    …
  },
  parseHTML() {
    …
  },
  renderHTML({ node, HTMLAttributes }) {
    …
  },
  addCommands() {
    …
  },
  addKeyboardShortcuts() {
    …
  },
  addInputRules() {
    …
  },
  // and more …
})
```

Read more about [all the nifty details building custom extensions](/guide/custom-extensions) in our guide.

ガイドで [カスタム拡張機能を構築するためのすべての気の利いた詳細](/guide/custom-extensions) の詳細をお読みください。

## 名前を変更した設定とメソッド

[多くの設定とメソッドの名前を変更しました](/api/editor)。 うまくいけば、検索と置換を使用して新しい API に移行できます。 変更点のリストは次のとおりです。

<!-- [We renamed a lot of settings and methods](/api/editor). Hopefully you can migrate to the new API with search & replace. Here is a list of what changed: -->

| 古い名前        | 新しい名前    |
| --------------- | ----------- |
| ~~`autoFocus`~~ | `autofocus` |

## コマンドの名前を変更

すべての新しい拡張機能には、スタイルを設定、設定解除、および切り替えるための特定のコマンドが付属しています。 したがって、`.bold()`の代わりに、`.toggleBold()` になりました。 また、lowerCamelCase に切り替えました。以下にいくつかの例を示します。 あぁ、`todo_list` の名前を `taskList` に変更しました。申し訳ありません。

<!-- All new extensions come with specific commands to set, unset and toggle styles. So instead of `.bold()`, it’s now `.toggleBold()`. Also, we switched to lowerCamelCase, below are a few examples. Oh, and we renamed `todo_list`, to `taskList`, sorry for that one. -->

| 古いコマンド              |  新しいコマンド                     |
| ------------------------ | ------------------------------- |
| `.redo()`                | `.redo()` (nothing changed)     |
| `.undo()`                | `.undo()` (nothing changed)     |
| ~~`.todo_list()`~~       | `.toggleTaskList()` (new name!) |
| ~~`.blockquote()`~~      | `.toggleBlockquote()`           |
| ~~`.bold()`~~            | `.toggleBold()`                 |
| ~~`.bullet_list()`~~     | `.toggleBulletList()`           |
| ~~`.code()`~~            | `.toggleCode()`                 |
| ~~`.code_block()`~~      | `.toggleCodeBlock()`            |
| ~~`.hard_break()`~~      | `.setHardBreak()`               |
| ~~`.heading()`~~         | `.toggleHeading()`              |
| ~~`.horizontal_rule()`~~ | `.setHorizontalRule()`          |
| ~~`.italic()`~~          | `.toggleItalic()`               |
| ~~`.link()`~~            | `.toggleLink()`                 |
| ~~`.ordered_list()`~~    | `.toggleOrderedList()`          |
| ~~`.paragraph()`~~       | `.setParagraph()`               |
| ~~`.strike()`~~          | `.toggleStrike()`               |
| ~~`.underline()`~~       | `.toggleUnderline()`            |
| …                        | …                               |

## メニューバー、バブルメニューバー、フローティングメニュー

<!-- Read the dedicated [guide on creating menus](/guide/menus) to migrate your menus. -->

専用の [メニュー作成ガイド](/guide/menus) を読んで、メニューを移行してください。

## コマンドをチェーンできるようになりました

現在、ほとんどのコマンドを1つの呼び出しに組み合わせることができます。 ほとんどの場合、これは個別の関数呼び出しよりも短くなります。 選択したテキストを太字にする例を次に示します。

<!-- Most commands can be combined to one call now. That’s shorter than separate function calls in most cases. Here is an example to make the selected text bold: -->

```js
editor.chain().toggleBold().focus().run()
```

<!-- The `.chain()` is required to start a new chain and the `.run()` is needed to actually execute all the commands in between. Read more about [the new Tiptap commands](/api/commands) in our API documentation. -->

新しいチェーンを開始するには `.chain()` が必要であり、その間のすべてのコマンドを実際に実行するには `.run()` が必要です。 [新しいTiptapコマンド](/api/commands) の詳細については、API ドキュメントをご覧ください。

## .focus() はすべてのコマンドで呼び出されません

Tiptap v1 で `.focus()` コマンドを非表示にしようとし、すべてのコマンドでそれを実行しました。 これにより、特定のユースケースで問題が発生しました。コマンドを実行したいが、エディターに焦点を合わせたくない場合です。

Tiptap v2 では、明示的に `focus()` を呼び出す必要があり、おそらく多くの場所でそれを実行したいと思うでしょう。 次に例を示します。

<!-- We tried to hide the `.focus()` command from you with Tiptap 1 and executed that on every command. That led to issues in specific use cases, where you want to run a command, but don’t want to focus the editor. -->

<!-- With Tiptap v2 you have to explicitly call the `focus()` and you probably want to do that in a lot of places. Here is an example: -->

```js
editor.chain().focus().toggleBold().run()
```

## イベントコールバックのパラメータは少なくなります

新しいイベントコールバックには、より少ないパラメーターがあります。 同じことが `this.` から利用できるようになりました。 [イベントの詳細については、こちらをご覧ください。](/api/events) 

<!-- The new event callbacks have fewer parameters. The same things should be available through `this.` now. [Read more about events here.](/api/events) -->

## 協調編集

協調編集のリファレンス実装では、現在 Y.js を使用しています。 それはまったく別のことです。 Tiptap 1 拡張機能は引き続き使用できますが、新しい拡張機能 API に適合させるかどうかはユーザー次第です。 これを行った場合は、ここからリンクできるように、忘れずに共有してください。

<!-- The reference implementation for collaborative editing uses Y.js now. That’s a whole different thing. You still can use the Tiptap 1 extension, but it’s up to you to adapt it to the new extension API. If you’ve done this, don’t forget to share it with us so we can link to it from here! -->

<!-- Read more about [the new collaborative editing experience](/guide/collaborative-editing) in our guide. -->

ガイドで [新しい協調編集体験](/guide/collaborative-editing) の詳細をご覧ください。

## マークはノードビューをサポートしなくなりました

<!-- For marks, node views are [not well supported in ProseMirror](https://discuss.prosemirror.net/t/there-is-a-bug-in-marks-nodeview/2722/2). There is also [a related issue](https://github.com/ueberdosis/tiptap/issues/613) for Tiptap 1. That’s why we removed it in Tiptap 2. -->

マークの場合、ノードビューは [ProseMirrorでは十分にサポートされていません](https://discuss.prosemirror.net/t/there-is-a-bug-in-marks-nodeview/2722/2)  Tiptap 1には [関連する問題](https://github.com/ueberdosis/tiptap/issues/613)もあります。そのため、Tiptap 2 で削除しました。

## スポンサーになる

<!-- tiptap wouldn’t exist without the funding of its community. If you fell in love with Tiptap, don’t forget to [become a sponsor](/sponsor) and make the maintenance, development and support sustainable. -->

<!-- In exchange, we’ll take you into our hearts, invite you to private repositories, add a `sponsor ♥` label to your issues and pull requests and more. -->

Tiptapは、コミュニティの資金がなければ存在しませんでした。 Tiptap に恋をした場合は、 [become a sponsor](/sponsor) を忘れずに、メンテナンス、開発、サポートを持続可能なものにしてください。

引き換えに、私たちはあなたを私たちの心に連れて行き、あなたをプライベートリポジトリに招待し、あなたの問題に「スポンサー♥」ラベルを追加し、リクエストをプルします。
