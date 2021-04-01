<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h1 class="text-dark mb-1" style="margin-top: 30px;">Nuevo atractivo turístico</h1>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="margin-top: 30px;">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Nueva atractivo</li>
                            <li class="breadcrumb-item"><a href="<?php echo  SERVERURL; ?>admin/listentrada">Lista de atractivos</a></li>
                        </ol>
                    </nav>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Crear nuevo atractivo</p>
                        </div>
                        <div class="card-body">
                            <form novalidate class="FormularioAjax" method="POST" data-form="save" enctype="multipart/form-data" autocomplete="off" action="<?php echo SERVERURL ?>admin/ajax-admin/entrada.ajax.php">

                                <!-- 1 Se ingresa el titulo -->
                                <h4 class="text-left">Título</h4>
                                <div class="form-group">
                                    <input type="text" maxlength="30" class="form-control" name="tituloAtr" placeholder="Título" />
                                </div>
                                <h4 class="text-left">Tipo</h4>
                                <div class="form-group">
                                    <select name="tipoAtr" class="browser-default custom-select">
                                        <option value="" disabled selected>Selecione un tipo</option>
                                        <option value="Atractivo natural">Atractivo natural</option>
                                        <option value="Atractivo cultural">Atractivo cultural</option>
                                    </select>

                                </div>
                                <!-- 1 fin  -->
                                <!-- 2 Se ingresa la imagen -->
                                <h4 class="text-left">Imagen de presentación</h4>
                                <div class="form-group">

                                    <div class="form-group mb-4 ">
                                        <div class="container">
                                            <p id="imagenInfo" class="text-black-50">Ninguna imagen seleccionada</p>
                                            <div class="row text-center text-lg-left" id="listImages">
                                            </div>
                                        </div>


                                        <input type="hidden" id="imagenVistaRuta" readonly name="imagenPathAtr" />


                                        <div>
                                            <button id="browseAtr" type="button" class="btn btn-primary browse">Subir imagen</button>
                                            <button id="clearList" type="button" class="btn btn-danger browse ">Quitar</button>
                                            <div id="editorAtr"></div>

                                        </div>

                                    </div>


                                </div>
                                <!-- 2 fin -->

                                <!-- Se ingresa la panoramica -->
                                <h4 class="text-left">Imagen en 360°</h4>

                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    Seleccione la carpeta que incluye la panoramica
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="container justify-content-center align-items-center mb-4" style="display: flex; flex-wrap: wrap; align-content:flex-start;">
                                    <div class="row text-center text-lg-left">
                                        <?php $path = './panoramas';
                                        $files = scandir($path);
                                        $files = array_diff(scandir($path), array('.', '..'));

                                        foreach ($files as $file) {
                                            echo '<div class="col-lg-2">';
                                            // if (is_dir($file)) {
                                            // echo "<a href='$file'>$file</a><br>";
                                            echo '<div id="selectFolder' . $file . '" class="selectFolder card-header clearmargin clearpadding">
                                                    <span> ' . $file . '</span>
                                            </div>';
                                            echo '<div class="m" role="button" id="' . $file . '">
                                                    <div class="row" >
                                                        <div class="col ">
                                                            <a class="h-100"  id="selectedImage' . $file . '" >
                                                                <img id="' . $file . '"  class="imgP img-fluid img-thumbnail" src="' . SERVERURL . 'admin/view-admin/assets/img/folder.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>';
                                            echo ' </div>';
                                        } ?>


                                    </div>
                                    <input type="hidden" id="imagen360Ruta" readonly name="imagenPathAtr360" />

                                </div>
                                <!-- 3 fin -->

                                <!-- 4 Texto en ckeditor -->
                                <h4 class="text-left">Información</h4>
                                <div class="form-group"><textarea rows="10" class="form-control ck-editor" id="editor" name="contenidoAtr" maxlength="50"></textarea></div>
                                <button class="btn btn-primary" id="submit" type="submit">Guardar</button>
                                <!-- 4 fin -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<script>
    // elfinder folder hash of the destination folder to be uploaded in this CKeditor 5
    const uploadTargetHash = 'l1_Lw';

    // elFinder connector URL
    const connectorUrl = '../../elFinder/php/connector.minimal.php';

    // To create CKEditor 5 classic editor
    ClassicEditor
        .create(document.querySelector('#editor'), {
            // toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'imageUpload', 'ckfinder', 'blockQuote', 'insertTable', 'mediaEmbed', 'undo', 'redo'],

            toolbar: {
                items: [
                    'heading',
                    '|',
                    'undo',
                    'redo',
                    'CKFinder',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'fontBackgroundColor',
                    'fontColor',
                    'fontSize',
                    'fontFamily',
                    'outdent',
                    'indent',
                    '|',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    '|',
                    'htmlEmbed',
                    '-'
                ],
                shouldNotGroupWhenFull: true
            },
            language: 'es',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            licenseKey: '',



            mediaEmbed: {
                previewsInData: true
            },
            htmlEmbed: {
                showPreviews: true,
                
            }


        })
        .then(editor => {
            editor12 = editor;
            const ckf = editor.commands.get('ckfinder'),
                fileRepo = editor.plugins.get('FileRepository'),
                ntf = editor.plugins.get('Notification'),
                i18 = editor.locale.t,
                // Insert images to editor window
                insertImages = urls => {
                    const imgCmd = editor.commands.get('imageUpload');
                    if (!imgCmd.isEnabled) {
                        ntf.showWarning(i18('Could not insert image at the current position.'), {
                            title: i18('Inserting image failed'),
                            namespace: 'ckfinder'
                        });
                        return;
                    }
                    editor.execute('imageInsert', {
                        source: urls
                    });
                },
                // To get elFinder instance
                getfm = open => {
                    return new Promise((resolve, reject) => {
                        // Execute when the elFinder instance is created
                        const done = () => {
                            if (open) {
                                // request to open folder specify
                                if (!Object.keys(_fm.files()).length) {
                                    // when initial request
                                    _fm.one('open', () => {
                                        _fm.file(open) ? resolve(_fm) : reject(_fm, 'errFolderNotFound');
                                    });
                                } else {
                                    // elFinder has already been initialized
                                    new Promise((res, rej) => {
                                        if (_fm.file(open)) {
                                            res();
                                        } else {
                                            // To acquire target folder information
                                            _fm.request({
                                                cmd: 'parents',
                                                target: open
                                            }).done(e => {
                                                _fm.file(open) ? res() : rej();
                                            }).fail(() => {
                                                rej();
                                            });
                                        }
                                    }).then(() => {
                                        // Open folder after folder information is acquired
                                        _fm.exec('open', open).done(() => {
                                            resolve(_fm);
                                        }).fail(err => {
                                            reject(_fm, err ? err : 'errFolderNotFound');
                                        });
                                    }).catch((err) => {
                                        reject(_fm, err ? err : 'errFolderNotFound');
                                    });
                                }
                            } else {
                                // show elFinder manager only
                                resolve(_fm);
                            }
                        };

                        // Check elFinder instance
                        if (_fm) {
                            // elFinder instance has already been created
                            done();
                        } else {
                            // To create elFinder instance
                            _fm = $('<div/>').dialogelfinder({
                                // dialog title
                                title: 'File Manager',
                                // connector URL
                                url: connectorUrl,
                                // start folder setting
                                startPathHash: open ? open : void(0),
                                // Set to do not use browser history to un-use location.hash
                                useBrowserHistory: false,
                                // Disable auto open
                                autoOpen: false,
                                // elFinder dialog width
                                width: '80%',
                                // set getfile command options
                                commandsOptions: {
                                    getfile: {
                                        oncomplete: 'close',
                                        multiple: true
                                    }
                                },
                                // Insert in CKEditor when choosing files
                                getFileCallback: (files, fm) => {
                                    let imgs = [];
                                    fm.getUI('cwd').trigger('unselectall');
                                    $.each(files, function(i, f) {
                                        if (f && f.mime.match(/^image\//i)) {
                                            imgs.push(fm.convAbsUrl(f.url));
                                        } else {
                                            editor.execute('link', fm.convAbsUrl(f.url));
                                        }
                                    });
                                    if (imgs.length) {
                                        insertImages(imgs);
                                    }
                                }
                            }).elfinder('instance');
                            done();
                        }
                    });
                };

            // elFinder instance
            let _fm;

            if (ckf) {
                // Take over ckfinder execute()
                ckf.execute = () => {
                    getfm().then(fm => {
                        fm.getUI().dialogelfinder('open');
                    });
                };
            }

            // Make uploader
            const uploder = function(loader) {
                let upload = function(file, resolve, reject) {
                    getfm(uploadTargetHash).then(fm => {
                        let fmNode = fm.getUI();
                        fmNode.dialogelfinder('open');
                        fm.exec('upload', {
                                files: [file],
                                target: uploadTargetHash
                            }, void(0), uploadTargetHash)
                            .done(data => {
                                if (data.added && data.added.length) {
                                    fm.url(data.added[0].hash, {
                                        async: true
                                    }).done(function(url) {
                                        resolve({
                                            'default': fm.convAbsUrl(url)
                                        });
                                        fmNode.dialogelfinder('close');
                                    }).fail(function() {
                                        reject('errFileNotFound');
                                    });
                                } else {
                                    reject(fm.i18n(data.error ? data.error : 'errUpload'));
                                    fmNode.dialogelfinder('close');
                                }
                            })
                            .fail(err => {
                                const error = fm.parseError(err);
                                reject(fm.i18n(error ? (error === 'userabort' ? 'errAbort' : error) : 'errUploadNoFiles'));
                            });
                    }).catch((fm, err) => {
                        const error = fm.parseError(err);
                        reject(fm.i18n(error ? (error === 'userabort' ? 'errAbort' : error) : 'errUploadNoFiles'));
                    });
                };

                this.upload = function() {
                    return new Promise(function(resolve, reject) {
                        if (loader.file instanceof Promise || (loader.file && typeof loader.file.then === 'function')) {
                            loader.file.then(function(file) {
                                upload(file, resolve, reject);
                            });
                        } else {
                            upload(loader.file, resolve, reject);
                        }
                    });
                };
                this.abort = function() {
                    _fm && _fm.getUI().trigger('uploadabort');
                };
            };

            // Set up image uploader
            fileRepo.createUploadAdapter = loader => {
                return new uploder(loader);
            };
        })
        .catch(error => {
            console.error(error);
        });
    document.querySelector('#submit').addEventListener('click', () => {
        const editorData = editor12.getData();
        console.log(editorData);
    });
</script>