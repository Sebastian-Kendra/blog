import moment from 'moment'

export default {
    data() {
        return {
            data: [],
            search: '',
        }
    },
    methods: {
        shorten(text, len = 50) {
            return _.truncate(text, { length: len })
        },
        niceDate(date) {
            return moment(date).format('DD/mm/y')
        },
    },
    computed: {
        filtredItems() {
            return this.data.filter((item) => {
                return item[this.searchColum]
                    .toLowerCase()
                    .includes(this.search.toLowerCase())
            })
        },
    },
}
