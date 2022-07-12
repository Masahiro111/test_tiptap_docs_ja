---
tableOfContents: true
---

# 構成

## はじめに

<!-- For most cases it’s enough to say where Tiptap should be rendered (`element`), what functionalities you want to enable (`extensions`) and what the initial document should be (`content`). -->

<!-- A few more things can be configured though. Let’s look at a fully configured editor example. -->

ほとんどの場合、Tiptap をレンダリングする場所（`element`）、有効にする機能（`extensions`）、最初のドキュメントを指定するだけで十分です（`content`）。

ただし、さらにいくつか設定することができます。完全に構成されたエディターの例を見てみましょう。

## エディターを構成する

構成を追加するには、次に示すように、[設定のあるオブジェクト](/api/editor) を `Editor`クラスに渡します。

<!-- To add your configuration, pass [an object with settings](/api/editor) to the `Editor` class, like shown here: -->

```js
import { Editor } from '@tiptap/core'
import Document from '@tiptap/extension-document'
import Paragraph from '@tiptap/extension-paragraph'
import Text from '@tiptap/extension-text'

new Editor({
  element: document.querySelector('.element'),
  extensions: [
    Document,
    Paragraph,
    Text,
  ],
  content: '<p>Example Text</p>',
  autofocus: true,
  editable: true,
  injectCSS: false,
})
```

<!-- This will do the following: -->

1. bind Tiptap to `.element`,
2. load the `Document`, `Paragraph` and `Text` extensions,
3. set the initial content,
4. place the cursor in the editor after initialization,
5. make the text editable (but that’s the default anyway), and
6. disable the loading of [the default CSS](https://github.com/ueberdosis/tiptap/tree/main/packages/core/src/style.ts) (which is not much anyway).


これにより、次のことが行われます。

1. Tiptap を `.element` にバインドします。
2. `Document`、`Paragraph`、および `Text` 拡張機能をロードします。
3. 初期コンテンツを設定します。
4. 初期化後、カーソルをエディタに置きます。
5. テキストを編集可能にし（ただし、とにかくそれがデフォルトです）。
6. [デフォルトのCSS](https://github.com/ueberdosis/tiptap/tree/main/packages/core/src/style.ts) の読み込みを無効にします（とにかくそれほど多くはありません）。

## ノード、マーク、拡張機能

ほとんどの編集機能は、[node](/api/nodes)、[mark](/api/marks)、または [extension](/api/extensions) としてバンドルされています。必要なものをインポートし、それらを配列としてエディターに渡します。

これは、3つの拡張機能のみを使用した最小限のセットアップです。

<!-- Most editing features are bundled as [node](/api/nodes), [mark](/api/marks) or [extension](/api/extensions). Import what you need and pass them as an array to the editor. -->

<!-- Here is the minimal setup with only three extensions: -->

```js
import { Editor } from '@tiptap/core'
import Document from '@tiptap/extension-document'
import Paragraph from '@tiptap/extension-paragraph'
import Text from '@tiptap/extension-text'

new Editor({
  element: document.querySelector('.element'),
  extensions: [
    Document,
    Paragraph,
    Text,
  ],
})
```

### 拡張機能を構成する

ほとんどの拡張機能を構成できます。`.configure()` を追加し、それにオブジェクトを渡します。

次の例では、デフォルトの見出しレベル4、5、および6を無効にし、1、2、および 3のみを許可します。

<!-- Most extensions can be configured. Add a `.configure()` and pass an object to it. -->

<!-- The following example will disable the default heading levels 4, 5 and 6 and just allow 1, 2 and 3: -->

```js
import { Editor } from '@tiptap/core'
import Document from '@tiptap/extension-document'
import Paragraph from '@tiptap/extension-paragraph'
import Text from '@tiptap/extension-text'
import Heading from '@tiptap/extension-heading'

new Editor({
  element: document.querySelector('.element'),
  extensions: [
    Document,
    Paragraph,
    Text,
    Heading.configure({
      levels: [1, 2, 3],
    }),
  ],
})
```

<!-- Have a look at the documentation of the extension you are using to learn more about their settings. -->

それらの設定の詳細については、使用している拡張機能のドキュメントを参照してください。

### デフォルトの拡張機能

最も一般的な拡張機能のいくつかを`StarterKit` 拡張機能にバンドルしました。これを使用する方法は次のとおりです。

<!-- We have bundled a few of the most common extensions into a `StarterKit` extension. Here is how you to use that: -->

```js
import StarterKit from '@tiptap/starter-kit'

new Editor({
  extensions: [
    StarterKit,
  ],
})
```

<!-- You can even pass a configuration for all included extensions as an object. Just prefix the configuration with the extension name: -->

含まれているすべての拡張機能の構成をオブジェクトとして渡すこともできます。構成の前に拡張子名を付けるだけです。

```js
import StarterKit from '@tiptap/starter-kit'

new Editor({
  extensions: StarterKit.configure({
    heading: {
      levels: [1, 2, 3],
    },
  }),
})
```

<!-- The `StarterKit` extension loads the most common extensions, but not all available extensions. If you want to load additional extensions or add a custom extension, add them to the `extensions` array: -->

`StarterKit` 拡張機能は最も一般的な拡張機能をロードしますが、利用可能なすべての拡張機能をロードするわけではありません。追加の拡張機能をロードしたり、カスタム拡張機能を追加したりする場合は、それらを `extensions` 配列に追加します。

```js
import StarterKit from '@tiptap/starter-kit'
import Strike from '@tiptap/extension-strike'

new Editor({
  extensions: [
    StarterKit,
    Strike,
  ],
})
```

<!-- Don’t want to load a specific extension from the `StarterKit`? Just pass `false` to the config: -->

`StarterKit` から特定の拡張機能をロードしたくないですか？設定に `false` を渡すだけです。

```js
import StarterKit from '@tiptap/starter-kit'

new Editor({
  extensions: [
    StarterKit.configure({
      history: false,
    }),
  ],
})
```

<!-- You will probably see something like that in collaborative editing examples. The [`Collaboration`](/api/extensions/collaboration) comes with its own history extension. You need to remove or disable the default [`History`](/api/extensions/history) extension to avoid conflicts. -->

協調編集の例では、おそらくそのようなものが見られるでしょう。 [`Collaboration`](/api/extensions/collaboration) には、独自の履歴拡張機能が付属しています。競合を避けるために、デフォルトの[`History`](/api/extensions/history) 拡張機能を削除または無効にする必要があります。