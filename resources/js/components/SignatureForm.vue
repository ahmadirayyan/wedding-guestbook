<template>
    <div>
        <div class="modal fade" id="fillModal" tabindex="-1" role="dialog" aria-labelledby="fillModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" method="post" @submit.prevent="onSubmit">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fillModalLabel">Guest's Signature</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-6 control-label" for="name">Name</label>
                                    <div class="col-md-12" :class="{'has-error': errors.name}">
                                        <input id="name"
                                            v-model="signature.name"
                                            type="text"
                                            placeholder="Your name"
                                            class="form-control">
                                        <span v-if="errors.name" class="help-block text-danger">{{ errors.name[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-6 control-label" for="email">Your E-mail</label>
                                    <div class="col-md-12" :class="{'has-error': errors.email}">
                                        <input id="email"
                                            v-model="signature.email"
                                            type="text"
                                            placeholder="Your email"
                                            class="form-control">
                                        <span v-if="errors.email" class="help-block text-danger">{{ errors.email[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-6 control-label" for="body">Your message</label>
                                    <div class="col-md-12" :class="{'has-error': errors.body}">
                                                <textarea class="form-control"
                                                        id="body"
                                                        v-model="signature.body"
                                                        placeholder="Please enter your message here..."
                                                        rows="5"></textarea>
                                        <span v-if="errors.body" class="help-block text-danger">{{ errors.body[0] }}</span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                errors: [],
                saved: false,
                signature: {
                    name: null,
                    email: null,
                    body: null,
                }
            };
        },

        methods: {
            onSubmit() {
                this.saved = false;

                axios.post('api/signatures', this.signature)
                    .then(({data}) => this.setSuccessMessage())
                    .catch(({response}) => this.setErrors(response));
            },

            setErrors(response) {
                this.errors = response.data.errors;
            },

            setSuccessMessage() {
                this.reset();
                swal({
                    title: "Thank you!",
                    text: "We have saved your signature.",
                    icon: "success",
                    timer: 2000
                })
                .then((value) => {
                    this.$root.$emit('refreshGuestbook');
                });
            },

            reset() {
                this.errors = [];
                this.signature = {name: null, email: null, body: null};
            }
        }
    }
</script>