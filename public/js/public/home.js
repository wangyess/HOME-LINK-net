;(function () {
    'use strict';
    var app = new Vue({
        el: '#root',
        data: {
            list: [],
            row: {
                keyword:'',
                page:1,
            },
            timer:null,
        },
        mounted: function () {
            this.search();
            document
                .getElementById('search')       //刷新页面后焦点就到搜索上
                .focus();
        },
        methods: {
            search: function () {
                axios.post('/a/house/search', this.row)
                    .then((r) => {
                        if (r.data.success) {
                            this.list = r.data.data;
                        }
                    })
            },
            search_keyword:function () {
              clearTimeout(this.timer);
              this.timer=setTimeout(()=>{
                   this.search();
                },200)
            },
            reset:function () {
                this.row={};
            }

        }
    })
})();