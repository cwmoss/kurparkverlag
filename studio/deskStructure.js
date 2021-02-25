import S from '@sanity/desk-tool/structure-builder'
import MdSettings from 'react-icons/lib/md/settings'
import MdPerson from 'react-icons/lib/md/person'
import DraftsIcon from "react-icons/lib/fa/pencil"

const hiddenDocTypes = listItem =>
  !['tour', 'author', 'post', 'siteSettings'].includes(listItem.getId())

export default () =>
  S.list()
    .title('Content')
    .items([
      
      S.listItem()
        .title('Inhalte')
        .schemaType('post')
        .child(S.documentTypeList('post').title('Inhalte')),

      S.listItem()
        .title('Seiten')
        .schemaType('page')
        .child(S.documentTypeList('page').title('Seiten')),
      
      S.listItem()
        .title('Termine / Touren')
        .schemaType('tour')
        .child(S.documentTypeList('tour').title('Touren')),

      S.listItem()
        .title('Authors')
        .icon(MdPerson)
        .schemaType('author')
        .child(S.documentTypeList('author').title('Authors')),

      S.listItem()
        .title("Entwürfe")
        .icon(DraftsIcon)
        .child(
          S.documentList()
            .title("Entwürfe")
            .filter("_id in path('drafts.**')")
            .defaultOrdering([{ field: "_updatedAt", direction: "desc" }])
        ),

      // ...S.documentTypeListItems().filter(hiddenDocTypes),
      S.listItem()
        .title('Settings')
        .icon(MdSettings)
        .child(
          S.editor()
            .id('siteSettings')
            .schemaType('siteSettings')
            .documentId('siteSettings')
        ),

    ])
