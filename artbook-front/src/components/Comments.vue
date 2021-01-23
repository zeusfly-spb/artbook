<template>
    <div>
       <v-data-table
           :headers="headers"
           :items="comments"
           hide-default-footer
       >
           <template v-slot:item="{ item }">
               <tr>
                   <td>{{ item.subject }}</td>
                   <td>{{ item.body }}</td>
               </tr>
           </template>
           <template v-slot:no-data>
                Нет комментариев
           </template>
       </v-data-table>
        <v-card
            color="green lighten-5"
            elevation="0"
            v-if="!sent"
        >
            <v-container>
                <v-row>
                    <v-text-field
                        v-model="subject"
                        placeholder="Тема"
                    />
                </v-row>
                <v-row>
                    <v-textarea
                        outlined
                        v-model="body"
                        placeholder="Текст комментария"
                    />
                </v-row>
                <v-row
                    class="mb-2"
                >
                    <v-spacer/>
                    <v-btn
                        text
                        color="blue"
                        :disabled="!valid"
                        @click="addComment"
                    >
                        Отправить комментарий
                    </v-btn>
                </v-row>
            </v-container>
        </v-card>
        <v-alert
            v-else
            border="left"
            color="indigo"
            dark
        >
            Ваше сообщение успешно отправлено
        </v-alert>
    </div>
</template>

<script>
export default {
    name: 'Comments',
    props: {article: Object},
    data: () => ({
        sent: false,
        subject: '',
        body: '',
        comments: [],
        headers: [
            {text: 'Тема'},
            {text: 'Комментарий'}
        ]
    }),
    computed: {
        valid () {
            return this.subject.length && this.body.length
        }
    },
    methods: {
        addComment () {
            this.axios.post('/api/add_comment', {
                article_id: this.article.id,
                subject: this.subject,
                body: this.body
            })
                .then(res => {
                    this.comments.unshift(res.data.comment)
                    this.sent = true
                })
        }
    },
    watch: {
        article (val) {
            this.comments = val.comments.reverse()
        }
    }
}
</script>

<style scoped>

</style>
