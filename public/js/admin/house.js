;(function () {
    'use strict';

    var app = new Vue({
        el: '#root',
        data: {
            mssage: '',
            row: {},
            list: [],
        },
        mounted: function () {
            this.read();
        },
        methods: {
            read: function () {
                axios.get('/a/house/read')
                    .then((r) => {
                        if (r.data.success) {
                            this.list = r.data.data;
                        }
                    })
            },
            add: function (e) {
                e.preventDefault();
                axios.post('/a/house/add', this.row)
                    .then((r) => {
                        if (r.data.success) {
                            this.reset();
                            this.read();
                        }
                    })
            },
            reset: function () {
                this.row = {};
            }
        }
    })

})();