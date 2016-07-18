
Ext.define('Shopware.apps.SeoRewrite.model.Rewrite', {
    extend: 'Shopware.data.Model',

    configure: function() {
        return {
            controller: 'SeoRewrite',
            detail: 'Shopware.apps.SeoRewrite.view.detail.Rewrite'
        };
    },


    fields: [
        { name : 'id', type: 'int', useNull: true },
        { name : 'from', type: 'string', useNull: true },
        { name : 'to', type: 'string', useNull: true }
    ]
});

