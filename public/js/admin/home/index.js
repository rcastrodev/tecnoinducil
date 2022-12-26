let table = $('#page_table_slider').DataTable({
    serverSide: true,
    ajax: `${root}/slider/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: "content_1" },
        { data: "content_2"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

function dataSliderContent(content)
{
    let form = document.getElementById('form-update-slider')
    form.querySelector('input[name="id"]').setAttribute('value', content.id)
    if(content.order)
        form.querySelector('input[name="order"]').setAttribute('value', content.order)

    if(content.content_1)
        form.querySelector('input[name="content_1"]').setAttribute('value', content.content_1)

    if(content.content_2)
        form.querySelector('input[name="content_2"]').setAttribute('value', content.content_2)

    
    form.querySelector('img').setAttribute('src', `/${content.image}`)
}

