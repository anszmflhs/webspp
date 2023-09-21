<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('permintaan.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                },
                {
                    data: 'user.siswa.name',

                },
                {
                    data: 'user.siswa.nis',
                },
                {
                    data: 'kelas.jurusan'
                },
                {
                    data: 'spp.nominal'
                },
                // {
                //     data: 'tanggal_bayar',
                // },
                {
                    data: 'bukti_pembayaran',
                    render: function(data, type) {
                        const regex = /^(http|https):\/\//g
                        let src = '';

                        if (data == null) {
                            src =
                                'http://127.0.0.1:8000/images/no-image.jpg';
                        } else {

                            if (data.match(regex)) {

                                src = data;
                            } else {
                                const host = 'http://127.0.0.1:8000/uploads/bukti_pembayaran/';
                                src = host + data;
                            }
                        }

                        if (type === 'display') {
                            return '<img src="' + src + '"' + 'width="50" height="50">';
                        }
                        return src;
                    }
                },
                {
                    data: 'status'
                },
                {
                    data: 'action',

                    orderable: false,
                    searchable: false
                }
            ]
        });
    });



    // edit
    $("body").on("click", ".edit-button", function() {
        var id = $(this).attr("id")
        location.replace('/permintaan/' + id)
    })

    // delete
    $("body").on("click", ".delete-button", function() {
        var id = $(this).attr("id")

        Swal.fire({
            title: 'Yakin hapus data ini?',
            // text: "You won't be able to revert",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/permintaan/" + id,
                    method: "DELETE",
                    success: function(response) {
                        $('#dataTable').DataTable().ajax.reload()
                        Swal.fire(
                            '',
                            response.message,
                            'success'
                        )
                    },
                    error: function(err) {
                        if (err.status == 403) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Not allowed!'
                            })
                        }
                    }
                })
            }
        })
    })
</script>
