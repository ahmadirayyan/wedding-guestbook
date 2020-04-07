<template>
    <div>
        <div class="card mt-3 mb-3" v-for="signature in signatures">
            <div class="card-body">
                <h5 class="card-title">{{ signature.name }}</h5>
                <p class="card-text">{{ signature.body }}</p>
                <p class="card-text">
                    <small>
                        <span class="glyphicon glyphicon-calendar" id="visit"></span> {{ signature.date }} |
                        <span class="glyphicon glyphicon-flag" id="comment"></span> <a href="#" id="comments" @click="report(signature.id)">Report</a>
                    </small>
                </p>
            </div>
        </div>
        <paginate
                :page-count="pageCount"
                :click-handler="fetch"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'pagination'"
                :page-class="'page-item'"
                :page-link-class="'page-link'"
                :prev-class="'page-item'"
                :next-class="'page-item'"
                :prev-link-class="'page-link'"
                :next-link-class="'page-link'"
                :active-class="'active'">
        </paginate>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                signatures: [],
                pageCount: 1,
                endpoint: 'api/signatures?page='
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.signatures = data.data;
                        this.pageCount = data.meta.last_page;
                    });
            },

            report(id) {
                if(confirm('Are you sure you want to report this signature?')) {
                    axios.put('api/signatures/'+id+'/report')
                    .then(response => this.removeSignature(id));
                }
            },

            removeSignature(id) {
                this.signatures = _.remove(this.signatures, function (signature) {
                    return signature.id !== id;
                });
            }
        }
    }
</script>