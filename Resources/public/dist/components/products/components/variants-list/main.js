define(["config","suluproduct/util/header"],function(a,b){"use strict";var c={productOverlayName:"variants",toolbarInstanceName:"variants"},d=60,e=function(){var b,d;this.status.id===a.get("product.status.active").id?(b=this.sandbox.translate(a.get("product.status.active").key),d="husky-publish"):(b=this.sandbox.translate(a.get("product.status.inactive").key),d="husky-test"),this.sandbox.sulu.initListToolbarAndList.call(this,"product-variants-list","/admin/api/products/fields",{el:"#list-toolbar",inHeader:!0,instanceName:c.toolbarInstanceName,parentTemplate:"default",template:function(){return[{id:"save-button",icon:"floppy-o",iconSize:"large","class":"highlight",position:11,group:"left",disabled:!0,callback:function(){this.sandbox.emit("sulu.header.toolbar.save")}.bind(this)},{id:"workflow",icon:d,title:b,type:"select",group:"left",position:30,items:[{id:"inactive",icon:"husky-test",title:this.sandbox.translate("product.workflow.set.inactive"),callback:function(){f.call(this,a.get("product.status.inactive").id)}.bind(this)},{id:"active",icon:"husky-publish",title:this.sandbox.translate("product.workflow.set.active"),callback:function(){f.call(this,a.get("product.status.active").id)}.bind(this)}]}]}.bind(this)},{el:"#product-variants",resultKey:"products",url:"/admin/api/products/"+this.options.data.id+"/variants?flat=true"})},f=function(a){this.options.data.status&&this.options.data.status.id===a||(this.status={id:a},h.call(this,!1))},g=function(){this.options.data.status=this.status,this.sandbox.emit("sulu.products.save",this.options.data)},h=function(a){a!==this.saved&&this.sandbox.emit("husky.toolbar."+c.toolbarInstanceName+".item.enable","save-button",!0),this.saved=a},i=function(){this.sandbox.on("husky.tabs.header.item.select",function(){b.resetToolbar(this.sandbox,this.options.locale,this.status)},this),this.sandbox.on("sulu.header.toolbar.item.loading",function(a){this.sandbox.emit("husky.toolbar."+c.toolbarInstanceName+".item.loading",a,!0)},this),this.sandbox.on("sulu.products.saved",function(a){this.options.data=a,this.status=a.status,this.saved=!0,this.sandbox.emit("husky.toolbar."+c.toolbarInstanceName+".item.disable","save-button",!1)},this),this.sandbox.on("sulu.header.toolbar.save",function(){g.call(this)},this),this.sandbox.on("sulu.list-toolbar.add",function(){m.call(this)},this),this.sandbox.on("sulu.list-toolbar.delete",function(){this.sandbox.emit("husky.datagrid.items.get-selected",function(a){this.sandbox.emit("sulu.products.variants.delete",a)}.bind(this))},this),this.sandbox.on("sulu.products.variant.deleted",function(a){this.sandbox.emit("husky.datagrid.record.remove",a)},this)},j=function(){this.sandbox.dom.html(this.$el,this.renderTemplate("/admin/product/template/product/variants")),e.call(this),l.call(this)},k=function(){var a="pim.product.title",b=[{title:"navigation.pim"},{title:"pim.products.title"}];this.options.data&&this.options.data.name&&(a=this.options.data.name),a=this.sandbox.util.cropTail(a,d),this.sandbox.emit("sulu.header.set-title",a),this.options.data&&this.options.data.number?b.push({title:"#"+this.options.data.number}):b.push({title:"pim.product.title"}),this.sandbox.emit("sulu.header.set-breadcrumb",b)},l=function(){var a=this.sandbox.dom.createElement("<div/>");this.sandbox.dom.append(this.$el,a),this.sandbox.start([{name:"products-overlay@suluproduct",options:{el:a,instanceName:c.productOverlayName,slides:[{title:"Products"}],translations:{addProducts:"products-overlay.add-variant"},filter:{parent:null,types:[1,4]}}}])},m=function(){this.sandbox.emit("sulu.products.products-overlay."+c.productOverlayName+".open")};return{name:"Sulu Product Variants List",view:!0,templates:["/admin/product/template/product/variants"],initialize:function(){this.saved=!0,this.status=this.options.data?this.options.data.status:a.get("product.status.active"),j.call(this),i.call(this),k.call(this)}}});