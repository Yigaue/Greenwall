!function(e){var t={};function n(s){if(t[s])return t[s].exports;var i=t[s]={i:s,l:!1,exports:{}};return e[s].call(i.exports,i,i.exports,n),i.l=!0,i.exports}n.m=e,n.c=t,n.d=function(e,t,s){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:s})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var s=Object.create(null);if(n.r(s),Object.defineProperty(s,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)n.d(s,i,function(t){return e[t]}.bind(null,i));return s},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=20)}([function(e,t){!function(){e.exports=this.wp.element}()},function(e,t){!function(){e.exports=this.wp.data}()},function(e,t){!function(){e.exports=this.wp.components}()},function(e,t){!function(){e.exports=this.wp.compose}()},function(e,t){!function(){e.exports=this.wp.i18n}()},function(e,t){e.exports=function(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t,n){var s=n(15),i=n(16),r=n(17),o=n(19);e.exports=function(e,t){return s(e)||i(e,t)||r(e,t)||o()},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){!function(){e.exports=this.regeneratorRuntime}()},function(e,t){!function(){e.exports=this.wp.blockEditor}()},function(e,t){!function(){e.exports=this.wp.plugins}()},function(e,t){!function(){e.exports=this.wp.dataControls}()},function(e,t){!function(){e.exports=this.wp.a11y}()},function(e,t){!function(){e.exports=this.wp.hooks}()},function(e,t){!function(){e.exports=this.lodash}()},function(e,t){!function(){e.exports=this.wp.coreData}()},function(e,t){e.exports=function(e){if(Array.isArray(e))return e},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=function(e,t){var n=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=n){var s,i,r=[],o=!0,a=!1;try{for(n=n.call(e);!(o=(s=n.next()).done)&&(r.push(s.value),!t||r.length!==t);o=!0);}catch(e){a=!0,i=e}finally{try{o||null==n.return||n.return()}finally{if(a)throw i}}return r}},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t,n){var s=n(18);e.exports=function(e,t){if(e){if("string"==typeof e)return s(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?s(e,t):void 0}},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=function(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,s=new Array(t);n<t;n++)s[n]=e[n];return s},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t,n){"use strict";n.r(t);var s={};n.r(s),n.d(s,"getSettings",(function(){return O})),n.d(s,"getCustom",(function(){return h})),n.d(s,"getFormInfo",(function(){return j})),n.d(s,"getSections",(function(){return _})),n.d(s,"getModifiedSettings",(function(){return y}));var i={};n.r(i),n.d(i,"updateSetting",(function(){return E})),n.d(i,"updateCustom",(function(){return w})),n.d(i,"resetFormSaveState",(function(){return C})),n.d(i,"saveSettings",(function(){return P}));var r=n(0),o=n(4),a=n(3),c=n(2),l=n(1),u=n(9),f=n(10),g=n(5),b=n.n(g);function p(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(e);t&&(s=s.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,s)}return n}function d(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?p(Object(n),!0).forEach((function(t){b()(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):p(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}
/**
 * Reducer for the Genesis Blocks data store.
 *
 * The reducer handles actions sent to the data store. Reducers must be pure so
 * they should have no side effects. Do not put API calls into the reducer.
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */var m=d({form:{fail:!1,success:!1,is_saving:!1},custom:[],modifiedSettings:[]},genesisBlocksSettingsData),v=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:m,t=arguments.length>1?arguments[1]:void 0;return"UPDATE_CUSTOM"===t.type?d(d({},e),{},{custom:d(d({},e.custom),{},b()({},t.setting.key,t.setting.value))}):"UPDATE_SETTING"===t.type?d(d({},e),{},{settings:d(d({},e.settings),{},b()({},t.setting.key,t.setting.value)),modifiedSettings:d(d({},e.modifiedSettings),{},b()({},t.setting.key,t.setting.value))}):"SAVING"===t.type?d(d({},e),{},{form:d(d({},e.form),{},{fail:!1,success:!1,is_saving:!0})}):"SAVED"===t.type?d(d({},e),{},{form:d(d({},e.form),{},{success:!0===t.success,fail:!0!==t.success,is_saving:!1}),modifiedSettings:t.success?[]:e.modifiedSettings}):"RESET"===t.type?d(d({},e),{},{form:d(d({},e.form),{},{fail:!1,success:!1,is_saving:!1})}):e},O=function(e){return e.settings||{}},h=function(e){return e.custom||{}},j=function(e){return e.form||{}};function _(e){return e.hasOwnProperty("sections")?e.sections:{}}var y=function(e){return e.modifiedSettings||[]},S=n(7),k=n.n(S),x=(n(14),k.a.mark(P));
/**
 * Actions let components change store state by sending a payload of data.
 *
 * This file exposes methods to send actions of a given type to the Genesis Blocks
 * data store. The reducer (reducer.js) then determines how to update store
 * state based on the type of action it receives.
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */
function E(e){return{type:"UPDATE_SETTING",setting:e}}function w(e){return{type:"UPDATE_CUSTOM",setting:e}}function C(){return{type:"RESET"}}function P(e){var t;return k.a.wrap((function(n){for(;;)switch(n.prev=n.next){case 0:return n.next=2,{type:"SAVING"};case 2:t=null;try{wp.data.dispatch("core").saveSite(e),t=!0}catch(e){t=!1}return n.abrupt("return",{type:"SAVED",success:t});case 5:case"end":return n.stop()}}),x)}
/**
 * Registers the 'genesis-blocks/global-settings' WordPress data store.
 *
 * @see docs/modules/settings.md
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */var M={selectors:s,actions:i,reducer:v,controls:f.controls},T=(Object(l.registerStore)("genesis-blocks/global-settings",M),n(11)),A=n(12);var D=Object(a.compose)([Object(l.withSelect)((function(e){return{form:e("genesis-blocks/global-settings").getFormInfo(),settings:e("genesis-blocks/global-settings").getModifiedSettings(),custom:e("genesis-blocks/global-settings").getCustom()}}))])((
/**
 * SaveButton component
 *
 * Shows an adjacent notice with the result of the save operation.
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */
function(e){var t=e.form,n=e.settings,s=e.custom,i=e.children,o=e.successMessage,a=e.failMessage,u=e.messageDuration,f=Object(r.useRef)(),g=window.GenesisAnalytics.GAClient;return Object(r.createElement)(r.Fragment,null,Object(r.createElement)(c.Button,{isPrimary:!0,isBusy:t.is_saving,disabled:t.is_saving,onClick:function(){g.enableAnalytics(n.genesis_blocks_analytics_opt_in),Object(A.doAction)("genesisBlocks.savingSettings",n,s),clearTimeout(f.current),Object(l.dispatch)("genesis-blocks/global-settings").saveSettings(n)},className:"genesis-blocks-settings-save has-notices"},i),t.success||t.fail?function(){f.current=setTimeout((function(){return Object(l.dispatch)("genesis-blocks/global-settings").resetFormSaveState()}),1e3*u);var e=t.success?o:a;Object(T.speak)(e,"polite");var n="genesis-blocks-save-notice"+"".concat(t.success?" success":"")+"".concat(t.fail?" fail":"");return Object(r.createElement)("span",{className:n},e)}():"")}));
/**
 * Checkbox field
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */var N=Object(a.compose)([Object(l.withDispatch)((function(){return{onUpdate:function(e){Object(l.dispatch)("genesis-blocks/global-settings").updateSetting({key:e.key,value:e.value})}}}))])((function(e){var t=e.settings,n=e.field,s=e.onUpdate;return Object(r.createElement)(c.CheckboxControl,{className:n.class,heading:n.heading,label:n.label,help:n.help,checked:!!t[n.id]&&t[n.id],onChange:function(e){return s({key:n.id,value:e})}})}));var U=
/**
 * Html field
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */
function(e){var t=e.field;return Object(r.createElement)("div",{dangerouslySetInnerHTML:{__html:t.content}})},I=n(13),F=n(8),R=["image"],B=Object(o.__)("Image"),G=Object(o.__)("Select an image"),z=Object(o.__)("Choose image"),V=Object(o.__)("Replace image"),L=Object(o.__)("Remove image");var H=Object(l.withSelect)((function(e,t){var n=e("core").getMedia,s=t.settings[t.field.id];return{media:s?n(s):null,imageId:s}})),W=Object(l.withDispatch)((function(e,t){var n=e("genesis-blocks/global-settings").updateSetting;return{onUpdateImage:function(e){n({key:t.field.id,value:e.id})},onRemoveImage:function(){n({key:t.field.id,value:null})}}})),$=Object(a.compose)(H,W)((function(e){var t,n,s,i=e.field,o=e.imageId,a=e.media,l=e.onUpdateImage,u=e.onRemoveImage;if(a){var f=i.image_size||"thumbnail";Object(I.has)(a,["media_details","sizes",f])?(t=a.media_details.sizes[f].width,n=a.media_details.sizes[f].height,s=a.media_details.sizes[f].source_url):(t=a.media_details.width,n=a.media_details.height,s=a.source_url)}return Object(r.createElement)(r.Fragment,null,Object(r.createElement)("div",{className:"genesis-blocks-settings-image"},Object(r.createElement)("p",{className:"components-base-control__label"},i.label||B),Object(r.createElement)(F.MediaUpload,{title:i.label_media_modal||G,onSelect:l,allowedTypes:R,render:function(e){var l=e.open;return Object(r.createElement)("div",{className:"genesis-blocks-settings-image__container"},Object(r.createElement)(c.Button,{className:o?"genesis-blocks-settings-image__preview":"genesis-blocks-settings-image__toggle",onClick:l,"aria-label":i.label_button_aria||null,isSecondary:!0},!!o&&a&&Object(r.createElement)(c.ResponsiveWrapper,{naturalWidth:t,naturalHeight:n,isInline:!0},Object(r.createElement)("img",{src:s,alt:""})),!!o&&!a&&Object(r.createElement)(c.Spinner,null),!o&&(i.label_button||z)))},value:o}),!!o&&a&&!a.isLoading&&Object(r.createElement)(F.MediaUpload,{title:i.label_media_modal||G,onSelect:l,allowedTypes:R,modalClass:"genesis-blocks-settings-image__media-modal",render:function(e){var t=e.open;return Object(r.createElement)(c.Button,{onClick:t,isSecondary:!0,"aria-label":i.label_replace_aria||null},i.label_replace||V)}}),!!o&&Object(r.createElement)(c.Button,{onClick:u,isLink:!0,isDestructive:!0,"aria-label":i.label_remove_aria||null},i.label_remove||L),!!i.help&&Object(r.createElement)("p",{id:i.id+"__help",className:"components-base-control__help"},i.help)))})),q=n(6),J=n.n(q);var K={checkbox:N,html:U,image:$,radio:Object(a.compose)([Object(l.withDispatch)((function(){return{onUpdate:function(e){Object(l.dispatch)("genesis-blocks/global-settings").updateSetting({key:e.key,value:e.value})}}}))])((
/**
 * Radio field
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */
function(e){var t=e.settings,n=e.field,s=e.onUpdate;return Object(r.createElement)(c.RadioControl,{className:n.class,label:n.label,help:n.help,selected:!!t[n.id]&&t[n.id],options:function(e){for(var t=[],n=0,s=Object.entries(e);n<s.length;n++){var i=J()(s[n],2),r=i[0],o=i[1];t.push({value:r,label:o})}return t}(n.options),onChange:function(e){return s({key:n.id,value:e})}})})),select:Object(a.compose)([Object(l.withDispatch)((function(){return{onUpdate:function(e){Object(l.dispatch)("genesis-blocks/global-settings").updateSetting({key:e.key,value:e.value})}}}))])((
/**
 * Select field
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */
function(e){var t=e.settings,n=e.field,s=e.onUpdate;return Object(r.createElement)(c.SelectControl,{className:n.class,label:n.label,help:n.help?n.help:"",value:!!t[n.id]&&t[n.id],options:function(e){for(var t=[],n=0,s=Object.entries(e);n<s.length;n++){var i=J()(s[n],2),r=i[0],o=i[1];t.push({value:r,label:o})}return t}(n.options),onChange:function(e){return s({key:n.id,value:e})}})})),text:Object(a.compose)([Object(l.withDispatch)((function(){return{onUpdate:function(e){Object(l.dispatch)("genesis-blocks/global-settings").updateSetting({key:e.key,value:e.value})}}}))])((
/**
 * Text field
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */
function(e){var t=e.settings,n=e.field,s=e.onUpdate;return Object(r.createElement)(c.TextControl,{className:n.class,label:n.label?n.label:"",help:n.help?n.help:"",onChange:function(e){return s({key:n.id,value:e})},value:t[n.id]?t[n.id]:""})})),textarea:Object(a.compose)([Object(l.withDispatch)((function(){return{onUpdate:function(e){Object(l.dispatch)("genesis-blocks/global-settings").updateSetting({key:e.key,value:e.value})}}}))])((
/**
 * Textarea field
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */
function(e){var t=e.settings,n=e.field,s=e.onUpdate;return Object(r.createElement)(c.TextareaControl,{className:n.class,label:n.label?n.label:"",help:n.help?n.help:"",onChange:function(e){return s({key:n.id,value:e})},value:t[n.id]?t[n.id]:""})}))};var Q=Object(a.compose)([Object(l.withSelect)((function(){return{settings:Object(l.select)("genesis-blocks/global-settings").getSettings(),sections:Object(l.select)("genesis-blocks/global-settings").getSections()}}))])((function(e){var t=e.settings,n=e.sections;return Object(r.createElement)(r.Fragment,null,Object(r.createElement)(c.TabPanel,{className:"genesis-blocks-settings-sections",activeClass:"gb-nav-tab-active",onSelect:function(){Object(l.dispatch)("genesis-blocks/global-settings").resetFormSaveState()},tabs:Object.values(function(e){for(var t in e)e[t].className="gb-nav-tab gb-admin-button";return e}(n))},(function(e){return Object(r.createElement)("div",{className:"gb-admin-plugin-admin-body"},Object(r.createElement)("div",{className:"gb-admin-plugin-container"},function(e){if(e.hasOwnProperty("fields")&&Array.isArray(e.fields)){var n=e.fields.map((function(e,n){if(!K.hasOwnProperty(e.type))return"";var s=K[e.type];return Object(r.createElement)(s,{key:n,settings:t,field:e})}));if(n.length>0)return Object(r.createElement)(r.Fragment,null,n)}return Object(r.createElement)("p",null,Object(o.__)("No fields found for this section.","genesis-blocks"))}(e),Object(r.createElement)(c.SlotFillProvider,null,Object(r.createElement)(c.Slot,{name:"GenesisBlocksSettings_"+e.name.replace("genesis_blocks_settings_","")}),Object(r.createElement)(u.PluginArea,null)),Object(r.createElement)(D,{successMessage:Object(o.__)("Settings saved","genesis-blocks"),failMessage:Object(o.__)("Saving failed","genesis-blocks"),messageDuration:"2"},Object(o.__)("Save All","genesis-blocks"))))})))}));
/**
 * The React application for the Genesis Blocks settings page.
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */Object(r.render)(Object(r.createElement)(Q,null),document.getElementById("root"))}]);