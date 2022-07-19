---
tableOfContents: true
---

# エディター

## はじめに

<!-- This class is a central building block of Tiptap. It does most of the heavy lifting of creating a working  [ProseMirror](https://ProseMirror.net/) editor such as creating the [`EditorView`](https://ProseMirror.net/docs/ref/#view.EditorView), setting the initial [`EditorState`](https://ProseMirror.net/docs/ref/#state.Editor_State)  -->

このクラスは、Tiptap の中心的な構成要素です。これは、[`EditorView`](https://ProseMirror.net/docs/ref/#view.EditorView) の作成など、機能する [ProseMirror](https://ProseMirror.net/) エディターを作成するための手間のかかる作業のほとんどを実行します）。初期設定 [`EditorState`](https://ProseMirror.net/docs/ref/#state.Editor_State) などを設定します。

## メソッド

エディターインスタンスは、一連のパブリックメソッドを提供します。メソッドは通常の関数であり、何でも返すことができます。編集者との共同作業に役立ちます。

メソッドを [コマンド](/api/commands) と混同しないでください。コマンドは、エディターの状態（コンテンツ、選択など）を変更し、`true` または `false` のみを返すために使用されます。

<!-- The editor instance will provide a bunch of public methods. Methods are regular functions and can return anything. They’ll help you to work with the editor. -->

<!-- Don’t confuse methods with [commands](/api/commands). Commands are used to change the state of editor (content, selection, and so on) and only return `true` or `false`. -->

### can()

<!-- Check if a command or a command chain can be executed – without actually executing it. Can be very helpful to enable/disable or show/hide buttons. -->

コマンドまたはコマンドチェーンを実際に実行せずに実行できるかどうかを確認します。ボタンを「有効 / 無効」または「表示 / 非表示」にするのに非常に役立ちます。

```js
// Returns `true` if the undo command can be executed
editor.can().undo()
```

### chain()

<!-- Create a command chain to call multiple commands at once. -->

一度に複数のコマンドを呼び出すコマンドチェーンを作成します。

```js
// Execute two commands at once
editor.chain().toggleBold().focus().run()
```

### destroy()

<!-- Stops the editor instance and unbinds all events. -->

エディタインスタンスを停止し、すべてのイベントのバインドを解除します。

```js
// Hasta la vista, baby!
editor.destroy()
```

### getHTML()

<!-- Returns the current editor document as HTML -->

現在のエディタドキュメントを HTML として返します

```js
editor.getHTML()
```

### getJSON()

<!-- Returns the current editor document as JSON. -->

現在のエディタードキュメントを JSON として返します。

```js
editor.getJSON()
```

### getText()

<!-- Returns the current editor document as plain text. -->

現在のエディタドキュメントをプレーンテキストとして返します。

| パラメーター  | タイプ                           | 説明              |
| ---------- | ------------------------------ | ------------------------ |
| options | { blockSeparator?: string, textSerializers?: Record<string, TextSerializer>} | Options for the serialization.  |

```js
// Give me plain text!
editor.getText()
// Add two line breaks between nodes
editor.getText({ blockSeparator: "\n\n" })
```

### getAttributes()

<!-- Get attributes of the currently selected node or mark. -->

現在選択されているノードまたはマークの属性を取得します。

| パラメーター  | タイプ                           | 説明              |
| ---------- | ------------------------------ | ------------------------ |
| typeOrName | string \| NodeType \| MarkType | Name of the node or mark |

```js
editor.getAttributes('link').href
```

### isActive()

<!-- Returns if the currently selected node or mark is active. -->

現在選択されているノードまたはマークがアクティブかどうかを返します。

| パラメーター              | タイプ                | 説明                    |
| ---------------------- | ------------------- | ------------------------------ |
| name                   | string \| null      | Name of the node or mark       |
| attributes             | Record<string, any> | Attributes of the node or mark |

```js
// Check if it’s a heading
editor.isActive('heading')
// Check if it’s a heading with a specific attribute value
editor.isActive('heading', { level: 2 })
// Check if it has a specific attribute value, doesn’t care what node/mark it is
editor.isActive({ textAlign: 'justify' })
```

### registerPlugin()

<!-- Register a ProseMirror plugin. -->

ProseMirror プラグインを登録

| パラメーター      | タイプ                                               | 説明                                               |
| -------------- | -------------------------------------------------- | --------------------------------------------------------- |
| plugin         | Plugin                                             | A ProseMirror plugin                                      |
| handlePlugins? | (newPlugin: Plugin, plugins: Plugin[]) => Plugin[] | Control how to merge the plugin into the existing plugins |

### setOptions()

<!-- Update editor options. -->

エディターオプションを更新

| パラメーター | タイプ                   | 説明       |
| --------- | ---------------------- | ----------------- |
| options   | Partial<EditorOptions> | A list of options |

```js
// Add a class to an existing editor instance
editor.setOptions({
  editorProps: {
    attributes: {
      class: 'my-custom-class',
    },
  },
})
```

### setEditable()

<!-- Update editable state of the editor. -->

エディターの編集可能な状態を更新

| パラメーター | タイプ    | 説明                                                   |
| --------- | ------- | ------------------------------------------------------------- |
| editable  | boolean | ユーザーがエディターに書き込める必要がある場合は `true` |

```js
// Make the editor read-only
editor.setEditable(false)
```

### unregisterPlugin()

<!-- Unregister a ProseMirror plugin. -->

ProseMirror プラグインの登録を解除します。

| パラメーター       | タイプ                | 説明      |
| --------------- | ------------------- | ---------------- |
| nameOrPluginKey | string \| PluginKey | The plugins name |

## ゲッター

### isEditable

<!-- Returns whether the editor is editable or read-only. -->

エディターが編集可能か読み取り専用かを返します。

```js
editor.isEditable
```

### isEmpty

<!-- Check if there is content. -->

コンテンツがあるかどうかを確認します。

```js
editor.isEmpty
```

## 設定

### element

<!-- The `element` specifies the HTML element the editor will be binded to. The following code will integrate Tiptap with an element with the `.element` class: -->

`element` は、エディタがバインドされるHTML要素を指定します。 次のコードは、Tiptapを `.element` クラスの要素と統合します。

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

new Editor({
  element: document.querySelector('.element'),
  extensions: [
    StarterKit,
  ],
})
```

You can even initiate your editor before mounting it to an element. This is useful when your DOM is not yet available. Just leave out the `element`, we’ll create one for you. Append it to your container at a later date like that:

```js
yourContainerElement.append(editor.options.element)
```

### extensions
It’s required to pass a list of extensions to the `extensions` property, even if you only want to allow paragraphs.

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'
import Document from '@tiptap/extension-document'
import Paragraph from '@tiptap/extension-paragraph'
import Text from '@tiptap/extension-text'
import Highlight from '@tiptap/extension-highlight'

new Editor({
  // Use the default extensions
  extensions: [
    StarterKit,
  ],

  // … or use specific extensions
  extensions: [
    Document,
    Paragraph,
    Text,
  ],

  // … or both
  extensions: [
    StarterKit,
    Highlight,
  ],
})
```

### content
With the `content` property you can provide the initial content for the editor. This can be HTML or JSON.

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

new Editor({
  content: `<p>Example Text</p>`,
  extensions: [
    StarterKit,
  ],
})
```

### editable
The `editable` property determines if users can write into the editor.

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

new Editor({
  content: `<p>Example Text</p>`,
  extensions: [
    StarterKit,
  ],
  editable: false,
})
```

### autofocus
With `autofocus` you can force the cursor to jump in the editor on initialization.

| Value     | 説明                                            |
| --------- | ------------------------------------------------------ |
| `'start'` | Sets the focus to the beginning of the document.       |
| `'end'`   | Sets the focus to the end of the document.             |
| `'all'`   | Selects the whole document.                            |
| `Number`  | Sets the focus to a specific position in the document. |
| `true`    | Enables autofocus.                                     |
| `false`   | Disables autofocus.                                    |
| `null`    | Disables autofocus.                                    |

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

new Editor({
  extensions: [
    StarterKit,
  ],
  autofocus: false,
})
```

### enableInputRules
By default, Tiptap enables all [input rules](/guide/custom-extensions/#input-rules). With `enableInputRules` you can control that.

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

new Editor({
  content: `<p>Example Text</p>`,
  extensions: [
    StarterKit,
  ],
  enableInputRules: false,
})
```

Alternatively you can allow only specific input rules.

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'
import Link from '@tiptap/extension-link'

new Editor({
  content: `<p>Example Text</p>`,
  extensions: [
    StarterKit,
    Link,
  ],
  // pass an array of extensions or extension names
  // to allow only specific input rules
  enableInputRules: [Link, 'horizontalRule'],
})
```

### enablePasteRules
By default, Tiptap enables all [paste rules](/guide/custom-extensions/#paste-rules). With `enablePasteRules` you can control that.

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

new Editor({
  content: `<p>Example Text</p>`,
  extensions: [
    StarterKit,
  ],
  enablePasteRules: false,
})
```

Alternatively you can allow only specific paste rules.

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'
import Link from '@tiptap/extension-link'

new Editor({
  content: `<p>Example Text</p>`,
  extensions: [
    StarterKit,
    Link,
  ],
  // pass an array of extensions or extension names
  // to allow only specific paste rules
  enablePasteRules: [Link, 'horizontalRule'],
})
```

### injectCSS
By default, Tiptap injects [a little bit of CSS](https://github.com/ueberdosis/tiptap/tree/main/packages/core/src/style.ts). With `injectCSS` you can disable that.

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

new Editor({
  extensions: [
    StarterKit,
  ],
  injectCSS: false,
})
```

### injectNonce
When you use a [Content-Security-Policy](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy) with `nonce`, you can specify a `nonce` to be added to dynamically created elements. Here is an example:

```js
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

new Editor({
  extensions: [
    StarterKit,
  ],
  injectCSS: true,
  injectNonce: "your-nonce-here"
})
```

### editorProps
For advanced use cases, you can pass `editorProps` which will be handled by [ProseMirror](https://prosemirror.net/docs/ref/#view.EditorProps). You can use it to override various editor events or change editor DOM element attributes, for example to add some Tailwind classes. Here is an example:

```js
new Editor({
  // Learn more: https://prosemirror.net/docs/ref/#view.EditorProps
  editorProps: {
    attributes: {
      class: 'prose prose-sm sm:prose lg:prose-lg xl:prose-2xl mx-auto focus:outline-none',
    },
    transformPastedText(text) {
      return text.toUpperCase()
    }
  }
})
```

You can use that to hook into event handlers and pass - for example - a custom paste handler, too.

### parseOptions
Passed content is parsed by ProseMirror. To hook into the parsing, you can pass `parseOptions` which are then handled by [ProseMirror](https://prosemirror.net/docs/ref/#model.ParseOptions).

```js
new Editor({
  // Learn more: https://prosemirror.net/docs/ref/#model.ParseOptions
  parseOptions: {
    preserveWhitespace: 'full',
  },
})
```
