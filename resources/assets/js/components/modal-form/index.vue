<template>
    <div class="modal fade" tabindex="-1" role="dialog" v-el:modal-form>
        <div class="modal-dialog">
            <div class="modal-content">
                <form @submit.prevent="submit">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <slot name="header"></slot>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <slot></slot>
                    </div>
                    <div class="modal-footer">
                        <slot name="footer"></slot>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</template>

<script>
export default {
    props: {
        show: {
            type: Boolean,
            required: true
        }
    },
    ready() {
        $(this.$els.modalForm).on('hidden.bs.modal', () => {
            this.close();
        })
    },
    methods: {
        submit() {
            this.$dispatch('modal-form-submited')
        },
        close() {
            this.show = false;
            this.$dispatch('modal-form-closed');
        }
    },
    watch: {
        show() {
            if(this.show) {
                this.$dispatch('modal-form-opened');
                return $(this.$els.modalForm).modal();
            }
            
            this.$dispatch('modal-form-closed');
            return $(this.$els.modalForm).modal('hide');
        }
    }
}
</script>