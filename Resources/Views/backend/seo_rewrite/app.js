
Ext.define('Shopware.apps.SeoRewrite', {
    extend: 'Enlight.app.SubApplication',

    name:'Shopware.apps.SeoRewrite',

    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [ 'Main' ],

    views: [
        'list.Window',
        'list.Rewrite',

        'detail.Rewrite',
        'detail.Window'
    ],

    models: [ 'Rewrite' ],
    stores: [ 'Rewrite' ],

    launch: function() {
        return this.getController('Main').mainWindow;
    }
});