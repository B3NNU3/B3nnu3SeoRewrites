
Ext.define('Shopware.apps.SeoRewrite.store.Rewrite', {
    extend:'Shopware.store.Listing',

    configure: function() {
        return {
            controller: 'SeoRewrite'
        };
    },
    model: 'Shopware.apps.SeoRewrite.model.Rewrite'
});