---
tableOfContents: true
---

# キーボード ショートカット

## はじめに

tiptap comes with sensible keyboard shortcut defaults. Depending on what you want to use it for, you’ll probably want to change those keyboard shortcuts to your liking. Let’s have a look at what we defined for you, and show you how to change it then!

Funfact: We built a [keyboard shortcut learning app](https://mouseless.app), to which we manually added exercises for thousands of keyboard shortcuts for a bunch of tools.

## Predefined keyboard shortcuts

Most of the core extensions register their own keyboard shortcuts. Depending on what set of extension you use, not all of the below listed keyboard shortcuts work for your editor.

### よく使うショートカット

| Command                   | Windows/Linux                   | macOS                       |
| ------------------------ | ------------------------------- | --------------------------- |
| Copy                     | `Ctrl` + `C`              | `Cmd` + `C`              |
| Cut                      | `Ctrl` + `X`              | `Cmd` + `X`              |
| Paste                    | `Ctrl` + `V`              | `Cmd` + `V`              |
| Paste without formatting | `Ctrl` + `Shift` + `V` | `Cmd` + `Shift` + `V` |
| Undo                     | `Ctrl` + `Z`              | `Cmd` + `Z`              |
| Redo                     | `Ctrl` + `Shift` + `Z` | `Cmd` + `Shift` + `Z` |
| Add a line break         | `Shift` + `Enter`            | `Shift` + `Enter`        |

### テキスト フォーマット

| Command        | Windows/Linux                   | macOS                       |
| ------------- | ------------------------------- | --------------------------- |
| Bold          | `Ctrl` + `B`              | `Cmd` + `B`              |
| Italicize     | `Ctrl` + `I`              | `Cmd` + `I`              |
| Underline     | `Ctrl` + `U`              | `Cmd` + `U`              |
| Strikethrough | `Ctrl` + `Shift` + `X` | `Cmd` + `Shift` + `X` |
| Highlight     | `Ctrl` + `Shift` + `H` | `Cmd` + `Shift` + `H` |
| Code          | `Ctrl` + `E`              | `Cmd` + `E`              |

### パラグラフ フォーマット

| Command                  | Windows/Linux                   | macOS                       |
| ----------------------- | ------------------------------- | --------------------------- |
| Apply normal text style | `Ctrl` + `Alt` + `0`   | `Cmd` + `Alt` + `0`   |
| Apply heading style 1   | `Ctrl` + `Alt` + `1`   | `Cmd` + `Alt` + `1`   |
| Apply heading style 2   | `Ctrl` + `Alt` + `2`   | `Cmd` + `Alt` + `2`   |
| Apply heading style 3   | `Ctrl` + `Alt` + `3`   | `Cmd` + `Alt` + `3`   |
| Apply heading style 4   | `Ctrl` + `Alt` + `4`   | `Cmd` + `Alt` + `4`   |
| Apply heading style 5   | `Ctrl` + `Alt` + `5`   | `Cmd` + `Alt` + `5`   |
| Apply heading style 6   | `Ctrl` + `Alt` + `6`   | `Cmd` + `Alt` + `6`   |
| Ordered list            | `Ctrl` + `Shift` + `7` | `Cmd` + `Shift` + `7` |
| Bullet list             | `Ctrl` + `Shift` + `8` | `Cmd` + `Shift` + `8` |
| Task list               | `Ctrl` + `Shift` + `9` | `Cmd` + `Shift` + `9` |
| Blockquote              | `Ctrl` + `Shift` + `B` | `Cmd` + `Shift` + `B` |
| Left align              | `Ctrl` + `Shift` + `L` | `Cmd` + `Shift` + `L` |
| Center align            | `Ctrl` + `Shift` + `E` | `Cmd` + `Shift` + `E` |
| Right align             | `Ctrl` + `Shift` + `R` | `Cmd` + `Shift` + `R` |
| Justify                 | `Ctrl` + `Shift` + `J` | `Cmd` + `Shift` + `J` |
| Code block              | `Ctrl` + `Alt` + `C`   | `Cmd` + `Alt` + `C`   |
| Subscript               | `Ctrl` + `,`              | `Cmd` + `,`              |
| Superscript             | `Ctrl` + `.`              | `Cmd` + `.`              |

<!--| Toggle task| `Ctrl` + `Enter` | `Cmd` + `Enter` | -->

### Text Selection

| Command                                            | Windows/Linux                   | macOS                       |
| ------------------------------------------------- | ------------------------------- | --------------------------- |
| Select all                                        | `Ctrl` + `A`              | `Cmd` + `A`              |
| Extend selection one character to left            | `Shift` + `←`                | `Shift` + `←`            |
| Extend selection one character to right           | `Shift` + `→`                | `Shift` + `→`            |
| Extend selection one line up                      | `Shift` + `↑`                | `Shift` + `↑`            |
| Extend selection one line down                    | `Shift` + `↓`                | `Shift` + `↓`            |
| Extend selection to the beginning of the document | `Ctrl` + `Shift` + `↑` | `Cmd` + `Shift` + `↑` |
| Extend selection to the end of the document       | `Ctrl` + `Shift` + `↓` | `Cmd` + `Shift` + `↓` |

## ショートカットの上書き

Keyboard shortcuts may be strings like `'Shift-Control-Enter'`. Keys are based on the strings that can appear in `event.key`, concatenated with a `-`. There is a little tool called [keycode.info](https://keycode.info/), which shows the `event.key` interactively.

Use lowercase letters to refer to letter keys (or uppercase letters if you want shift to be held). You may use `Space` as an alias for the <code>&nbsp;</code>.

Modifiers can be given in any order. `Shift`, `Alt`, `Control` and `Cmd` are recognized. For characters that are created by holding shift, the `Shift` prefix is implied, and should not be added explicitly.

You can use `Mod` as a shorthand for `Cmd` on Mac and `Control` on other platforms.

Here is an example how you can overwrite the keyboard shortcuts for an existing extension:

```js
// 1. Import the extension
import BulletList from '@tiptap/extension-bullet-list'

// 2. Overwrite the keyboard shortcuts
const CustomBulletList = BulletList.extend({
  addKeyboardShortcuts() {
    return {
      // ↓ your new keyboard shortcut
      'Mod-l': () => this.editor.commands.toggleBulletList(),
    }
  },
})

// 3. Add the custom extension to your editor
new Editor({
  extensions: [
    CustomBulletList(),
    // …
  ],
})
```
