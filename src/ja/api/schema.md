---
tableOfContents: true
---

# スキーマ

## はじめに

<!-- Unlike many other editors, Tiptap is based on a [schema](https://prosemirror.net/docs/guide/#schema) that defines how your content is structured. That enables you to define the kind of nodes that may occur in the document, its attributes and the way they can be nested. -->

<!-- This schema is *very* strict. You can’t use any HTML element or attribute that is not defined in your schema. -->

<!-- Let me give you one example: If you paste something like `This is <strong>important</strong>` into Tiptap, but don’t have any extension that handles `strong` tags, you’ll only see `This is important` – without the strong tags. -->

他の多くのエディターとは異なり、Tiptap はコンテンツの構造を定義する [スキーマ](https://prosemirror.net/docs/guide/#schema) に基づいています。これにより、ドキュメントで発生する可能性のあるノードの種類、その属性、およびそれらをネストする方法を定義できます。

このスキーマは *非常に* 厳密です。スキーマで定義されていない HTML 要素または属性を使用することはできません。

一例を挙げましょう。「これは <strong>重要 </strong> 」のようなものを Tiptap に貼り付けても、「strong」タグを処理する拡張子がない場合は、「これは 重要」と表示されるだけです。strong タグはありません。

## スキーマはどのように見えるか

提供されている拡張機能のみを使用する場合は、スキーマについてそれほど気にする必要はありません。独自の拡張機能を構築している場合は、スキーマがどのように機能するかを理解しておくと役立つでしょう。典型的な ProseMirror エディターの最も単純なスキーマを見てみましょう。

<!-- When you’ll work with the provided extensions only, you don’t have to care that much about the schema. If you’re building your own extensions, it’s probably helpful to understand how the schema works. Let’s look at the most simple schema for a typical ProseMirror editor: -->

```js
// the underlying ProseMirror schema
{
  nodes: {
    document: {
      content: 'block+',
    },
    paragraph: {
      content: 'inline*',
      group: 'block',
      parseDOM: [{ tag: 'p' }],
      toDOM: () => ['p', 0],
    },
    text: {
      group: 'inline',
    },
  },
}
```

<!-- We register three nodes here. `doc`, `paragraph` and `text`. `doc` is the root node which allows one or more block nodes as children (`content: 'block+'`). Since `paragraph` is in the group of block nodes (`group: 'block'`) our document can only contain paragraphs. Our paragraphs allow zero or more inline nodes as children (`content: 'inline*'`) so there can only be `text` in it. `parseDOM` defines how a node can be parsed from pasted HTML. `toDOM` defines how it will be rendered in the DOM. -->

<!-- In Tiptap every node, mark and extension is living in its own file. This allows us to split the logic. Under the hood the whole schema will be merged together: -->

ここで3つのノードを登録します。`doc`、`paragraph` および `text`。`doc` は、1つ以上のブロックノードを子として許可するルートノードです（`content: 'block+'`）。`paragraph` はブロックノードのグループ（`group: 'block'`）にあるため、ドキュメントには段落のみを含めることができます。私たちの段落では、0個以上のインラインノードを子として許可しているため（`content: 'inline*'`）、その中には `text` しか含めることができません。`parseDOM` は、貼り付けられた HTML からノードを解析する方法を定義します。`toDOM` は、DOM でのレンダリング方法を定義します。

Tiptapでは、すべてのノード、マーク、および拡張子が独自のファイルに存在します。これにより、ロジックを分割できます。内部的には、スキーマ全体がマージされます。

```js
// the Tiptap schema API
import { Node } from '@tiptap/core'

const Document = Node.create({
  name: 'doc',
  topNode: true,
  content: 'block+',
})

const Paragraph = Node.create({
  name: 'paragraph',
  group: 'block',
  content: 'inline*',
  parseHTML() {
    return [
      { tag: 'p' },
    ]
  },
  renderHTML({ HTMLAttributes }) {
    return ['p', HTMLAttributes, 0]
  },
})

const Text = Node.create({
  name: 'text',
  group: 'inline',
})
```

## ノードとマーク

### 違い

<!-- Nodes are like blocks of content, for example paragraphs, headings, code blocks, blockquotes and many more. -->

<!-- Marks can be applied to specific parts of a node. That’s the case for **bold**, *italic* or ~~striked~~ text. [Links](#) are marks, too. -->

ノードは、段落、見出し、コードブロック、ブロッククォートなどのコンテンツのブロックのようなものです。

マークは、ノードの特定の部分に適用できます。これは、**太字**、*斜体*、または~~打たれた~~テキストの場合です。[Links](#) もマークです。

### ノードスキーマ

#### Content

content 属性は、ノードが持つことができるコンテンツの種類を正確に定義します。 ProseMirror はそれに対して本当に厳格です。つまり、スキーマに適合しないコンテンツは破棄されます。名前またはグループを文字列として想定しています。次にいくつかの例を示します。

<!-- The content attribute defines exactly what kind of content the node can have. ProseMirror is really strict with that. That means, content which doesn’t fit the schema is thrown away. It expects a name or group as a string. Here are a few examples: -->

```js
Node.create({
  // must have one or more blocks
  content: 'block+',

  // must have zero or more blocks
  content: 'block*',

  // allows all kinds of 'inline' content (text or hard breaks)
  content: 'inline*',

  // must not have anything else than 'text'
  content: 'text*',

  // can have one or more paragraphs, or lists (if lists are used)
  content: '(paragraph|list?)+',

  // must have exact one heading at the top, and one or more blocks below
  content: 'heading block+'
})
```

#### Marks

スキーマの `marks` 設定を使用して、ノード内で許可されるマークを定義できます。 1つ以上の名前またはマークのグループを追加し、次のようにすべてのマークを許可または禁止します。

<!-- You can define which marks are allowed inside of a node with the `marks` setting of the schema. Add a one or more names or groups of marks, allow all or disallow all marks like this: -->

```js
Node.create({
  // allows only the 'bold' mark
  marks: 'bold',

  // allows only the 'bold' and 'italic' marks
  marks: 'bold italic',

  // allows all marks
  marks: '_',

  // disallows all marks
  marks: '',
})
```

#### Group

<!-- Add this node to a group of extensions, which can be referred to in the [content](#content) attribute of the schema. -->

このノードを拡張機能のグループに追加します。拡張機能は、スキーマの[content](#content) 属性で参照できます。

```js
Node.create({
  // add to 'block' group
  group: 'block',

  // add to 'inline' group
  group: 'inline',

  // add to 'block' and 'list' group
  group: 'block list',
})
```

#### Inline

<!-- Nodes can be rendered inline, too. When setting `inline: true` nodes are rendered in line with the text. That’s the case for mentions. The result is more like a mark, but with the functionality of a node. One difference is the resulting JSON document. Multiple marks are applied at once, inline nodes would result in a nested structure. -->

ノードはインラインでレンダリングすることもできます。`inline: true` を設定すると、ノードはテキストに沿ってレンダリングされます。それは言及の場合です。結果はマークに似ていますが、ノードの機能を備えています。 1つの違いは、結果の JSON ドキュメントです。複数のマークが一度に適用されると、インラインノードはネストされた構造になります。

```js
Node.create({
  // renders nodes in line with the text, for example
  inline: true,
})
```

<!-- For some cases where you want features that aren’t available in marks, for example a node view, try if an inline node would work: -->

ノードビューなど、マークで使用できない機能が必要な場合は、インラインノードが機能するかどうかを試してください。

```js
Node.create({
  name: 'customInlineNode',
  group: 'inline',
  inline: true,
  content: 'text*',
})
```

#### Atom

<!-- Nodes with `atom: true` aren’t directly editable and should be treated as a single unit. It’s not so likely to use that in a editor context, but this is how it would look like: -->

`atom: true` のノードは直接編集できないため、単一のユニットとして扱う必要があります。これをエディターのコンテキストで使用する可能性はそれほど高くありませんが、次のようになります。

```js
Node.create({
  atom: true,
})
```

<!-- One example is the [`Mention`](/api/nodes/mention) extension, which somehow looks like text, but behaves more like a single unit. As this doesn’t have editable text content, it’s empty when you copy such node. Good news though, you can control that. Here is the example from the [`Mention`](/api/nodes/mention) extension: -->

1つの例は、[`Mention`](/api/nodes/mention) 拡張機能です。これは、どういうわけかテキストのように見えますが、単一のユニットのように動作します。これには編集可能なテキストコンテンツがないため、そのようなノードをコピーすると空になります。良いニュースですが、あなたはそれをコントロールすることができます。 [`Mention`](/api/nodes/mention) 拡張機能の例を次に示します。

```js
// Used to convert an atom node to plain text
renderText({ node }) {
  return `@${node.attrs.id}`
},
```

#### Selectable

<!-- Besides the already visible text selection, there is an invisible node selection. If you want to make your nodes selectable, you can configure it like this: -->

すでに表示されているテキストの選択に加えて、非表示のノードの選択があります。ノードを選択可能にする場合は、次のように構成できます。

```js
Node.create({
  selectable: true,
})
```

#### Draggable

<!-- All nodes can be configured to be draggable (by default they aren’t) with this setting: -->

この設定を使用すると、すべてのノードをドラッグ可能に構成できます（デフォルトではドラッグ可能ではありません）。

```js
Node.create({
  draggable: true,
})
```

#### Code

<!-- Users expect code to behave very differently. For all kind of nodes containing code, you can set `code: true` to take this into account. -->

ユーザーは、コードの動作が大きく異なることを期待しています。コードを含むすべての種類のノードについて、これを考慮に入れるために  `code: true` を設定できます。

```js
Node.create({
  code: true,
})
```

#### Whitespace

<!-- Controls way whitespace in this a node is parsed. -->

このノードの空白を解析する方法を制御します。

```js
Node.create({
  whitespace: 'pre',
})
```

#### Defining

<!-- Nodes get dropped when their entire content is replaced (for example, when pasting new content) by default. If a node should be kept for such replace operations, configure them as `defining`. -->

デフォルトでは、コンテンツ全体が置き換えられると（たとえば、新しいコンテンツを貼り付けるときに）、ノードはドロップされます。このような置換操作のためにノードを保持する必要がある場合は、それらを「defining (定義)」として構成します。

通常、これは [`Blockquote`](/api/nodes/blockquote), [`CodeBlock`](/api/nodes/code-block), [`Heading`](/api/nodes/heading), [`ListItem`](/api/nodes/list-item) に適用されます。

<!-- Typically, that applies to [`Blockquote`](/api/nodes/blockquote), [`CodeBlock`](/api/nodes/code-block), [`Heading`](/api/nodes/heading), and [`ListItem`](/api/nodes/list-item). -->

```js
Node.create({
  defining: true,
})
```

#### Isolating

<!-- For nodes that should fence the cursor for regular editing operations like backspacing, for example a TableCell, set `isolating: true`. -->

TableCell など、バックスペースなどの通常の編集操作のためにカーソルをフェンスする必要があるノードの場合は `isolating: true` を設定します。

```js
Node.create({
  isolating: true,
})
```

#### ギャップカーソルを許可する

[`Gapcursor`](/api/extensions/gapcursor) 拡張機能は、新しいスキーマ属性を登録して、そのノードのすべての場所でギャップカーソルを許可するかどうかを制御します。

<!-- The [`Gapcursor`](/api/extensions/gapcursor) extension registers a new schema attribute to control if gap cursors are allowed everywhere in that node. -->

```js
Node.create({
  allowGapCursor: false,
})
```

#### テーブルの役割

[`Table`](/api/nodes/table) 拡張機能は、ノードが持つ役割を構成するための新しいスキーマ属性を登録します。許可される値は `table`、`row`、`cell`、および `header_cell` です。

<!-- The [`Table`](/api/nodes/table) extension registers a new schema attribute to configure which role an Node has. Allowed values are `table`, `row`, `cell`, and `header_cell`. -->

```js
Node.create({
  tableRole: 'cell',
})
```

### マークスキーマ

#### Inclusive

カーソルが最後にあるときにマークをアクティブにしたくない場合は、包括的を `false` に設定します。たとえば、[`Link`](/api/marks/link) マークの設定方法は次のとおりです。

<!-- If you don’t want the mark to be active when the cursor is at its end, set inclusive to `false`. For example, that’s how it’s configured for [`Link`](/api/marks/link) marks: -->

```js
Mark.create({
  inclusive: false,
})
```

#### Excludes

デフォルトでは、すべてのノードを同時に適用できます。除外属性を使用すると、マークと共存してはならないマークを定義できます。たとえば、インラインコードマークは他のマーク（太字、斜体、その他すべて）を除外します。

<!-- By default all nodes can be applied at the same time. With the excludes attribute you can define which marks must not coexist with the mark. For example, the inline code mark excludes any other mark (bold, italic, and all others). -->

```js
Mark.create({
  // must not coexist with the bold mark
  excludes: 'bold'
  // exclude any other mark
  excludes: '_',
})
```

#### Group

<!-- Add this mark to a group of extensions, which can be referred to in the content attribute of the schema. -->

このマークを拡張機能のグループに追加します。これは、スキーマのコンテンツ属性で参照できます。

```js
Mark.create({
  // add this mark to the 'basic' group
  group: 'basic',
  // add this mark to the 'basic' and the 'foobar' group
  group: 'basic foobar',
})
```

#### Code

<!-- Users expect code to behave very differently. For all kind of marks containing code, you can set `code: true` to take this into account. -->

ユーザーは、コードの動作が大きく異なることを期待しています。コードを含むすべての種類のマークについて、これを考慮に入れるために `code: true` を設定できます。

```js
Mark.create({
  code: true,
})
```

#### Spanning

<!-- By default marks can span multiple nodes when rendered as HTML. Set `spanning: false` to indicate that a mark must not span multiple nodes. -->

デフォルトでは、マークは HTML としてレンダリングされるときに、複数のノードにまたがることができます。マークが複数のノードにまたがってはならないことを示すには、`spanning: false` を設定します。

```js
Mark.create({
  spanning: false,
})
```

## 基礎となる ProseMirror スキーマを取得します

基盤となるスキーマを操作する必要があるユースケースがいくつかあります。 Tiptap の共同テキスト編集機能を使用している場合、またはコンテンツを HTML として手動でレンダリングする場合は、これが必要になります。

<!-- There are a few use cases where you need to work with the underlying schema. You’ll need that if you’re using the Tiptap collaborative text editing features or if you want to manually render your content as HTML. -->

### オプション1：エディターを使用

クライアント側でこれが必要で、とにかくエディタインスタンスが必要な場合は、エディタから利用できます。

<!-- If you need this on the client side and need an editor instance anyway, it’s available through the editor: -->

```js
import { Editor } from '@tiptap/core'
import Document from '@tiptap/extension-document'
import Paragraph from '@tiptap/extension-paragraph'
import Text from '@tiptap/extension-text'

const editor = new Editor({
  extensions: [
    Document,
    Paragraph,
    Text,
    // add more extensions here
  ])
})

const schema = editor.schema
```

### オプション2：エディターなし

実際のエディターを初期化せずにスキーマを作成したいだけの場合は、`getSchema` ヘルパー関数を使用できます。利用可能な拡張機能の配列が必要であり、ProseMirror スキーマを便利に生成します。

<!-- If you just want to have the schema *without* initializing an actual editor, you can use the `getSchema` helper function. It needs an array of available extensions and conveniently generates a ProseMirror schema for you: -->

```js
import { getSchema } from '@tiptap/core'
import Document from '@tiptap/extension-document'
import Paragraph from '@tiptap/extension-paragraph'
import Text from '@tiptap/extension-text'

const schema = getSchema([
  Document,
  Paragraph,
  Text,
  // add more extensions here
])
```
