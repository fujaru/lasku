# Skinning

The Skin Support feature allows you to use custom set of CSS to alter 
the look and feel of Lasku. At the moment, only custom CSS is supported. 
Custom HTML layout and JS scripts are not supported.

All skin files are located under **`/skin`** directory. 

## Creating a New Skin

To create a new skin, first **create a new directory** under the **`/skin`** 
with the name of the skin you want. Let's say the skin name is "wonderskin". 
So your directory path will be `/skin/wonderskin`.

The structure of directories under the skin basically follows the directory 
structure of **`/static`**, ie:
* **/skin/{your-skin-name}**
	* **/css**
	* **/js** *(not supported)*
	* **/img**
	* /skin.json

## How Skin Works

When loading a CSS file, the skin engine first locate for a file under 
selected skin directory. If the specified file doesn't exist, it will then 
load the default CSS file.

For example, on `/client/list` page, the page wants a CSS file named 
**`client/list.css`**. For this file, the skin engine will try to load 
it from:
```
/skin/{your-skin-name}/css/client/list.css
```
If the above file doesn't exist, it will default to:
```
/static/css/client/list.css
```

## Crediting Your Work

You can put some information regarding your skin on a file named `skin.json`.
