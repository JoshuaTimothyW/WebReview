@if ($post=='No Post')
    <div class="alert alert-info text-center">
       <h3> {{$post}} </h3>
    </div>
@else
    @foreach ($post as $item)
        <form action="post" method="POST"> 
            {{ csrf_field() }}
            <div class="card mb-3">
                <div id="postid">
                        <div class="card-title border bg-light">
                                <img class="rounded-circle m-2" src=" {{ $item->members->img }} " alt="pp" height="50px" width="50px">
                                <div class="btn-group-vertical">
                                    <strong class="text-primary">{{ $item->members->name }}</strong> 
                                    {{ $item->create_at }}
                                </div>
                              </div>
                              <img class="card-img-top border-bottom" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxATERIQEBIPEBASFhISEBIQEBAQDxAPFRIWFxURFRUYHSggGBomGxUVITEhJSkrMC4uGB8zODMsNyguLysBCgoKDg0OGxAQGisdHh4vKy8rLS0rKy0tLS0tKystKy0tNSsvLSstKy0tLS0tLS0tKy0tLS0tLS03LSstLSstLf/AABEIAQIAwwMBIgACEQEDEQH/xAAcAAEAAwEBAQEBAAAAAAAAAAAABQYHBAMCAQj/xABJEAACAQIBBwcJBQUFCQEAAAAAAQIDEQQFBgcSITGxIiNBUXFyshMkMjM0YXOBwWJjkbPCFDV0gqFCosPR8ERTZIOEkpOj8RX/xAAaAQEAAwEBAQAAAAAAAAAAAAAAAQIDBAUG/8QALREBAAICAAUDAwIHAQAAAAAAAAECAxEEEiExMjNBYQUT8CLBNEJRcbHC0SP/2gAMAwEAAhEDEQA/ANxAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAfOuutfifqYH6AAAAAAAAAAAAAAAAAAAAAENnhiJ08FiKlOUoTjC8ZRdpJ6y2pkyQOfX7vxXc/UiYGHZSzwyjFq2MxK37qsjRNGuXMRXrU41a1SpF4ecpKc3JOaqQWtt6drMcys9q+Zpuh2V8RD+HrfmwLT2Q2EAFEhkmmGvJYmklKSXkU7JtK+vI1sx/TMvOqPwf8SRMCgZv4mX7ZRvJvnY72+s3fR5K+Hq/wARW4o/n7IT88pfFj4kb9o5fm9b+IrfpLT2QtYAKJAAAAAAAAAAAAAAAAAAB8zkkrsjspulWoTg1rwqRs1ttJfLadmOqKMJSk0ora291iqYXObB6kderyrLW5mu7vtUNpMQhmukPJ+BjXp0MLTcKq1/KwbqXvKK8lbWfWW/R7jsm0oU5U5RVaFGca75697wlKylsaTUm7FIzzxdOpj41IVG46y1pWlFKkpLVSi7N7L32dPSeWaOUo0Y1tdyTcKmpaLlq1bc1K9tlncto6af0JSxMJNxjJOSSbXSk9z/AKHqVbNXK1OtWqeSqXh5OnLUcJQflLvWltSv0FpKzGiHNVx9KM/JOVp2UtWz9Fuyf4lfznwGFqydavSjWjTpvem5JJuTttXRc5M6cTKGMpuU9WjahsknOPrJ+VtFJ6snBpXsrn1jcvYPVd6l10pQqpuN9v8AZ6rhLJcm1cJHHPEqNsJTrqo1qtuNBvkx1Xtbubfmri6E6U6mGjq0Z1JSjyVD+zG911n87wobK6jsvbyUXJX9an171G/4m36P8VGODcanlNRSl5NeTqTXk7LYrJ9N7++5Mi4YXExqJuF2k2tqa2o9iIzaqa1ObTvFzlq+6Oyyt0dhLlZAAAAAAAAAAAAAAAAAAARec/stXsXFGS06iUI3fQa1nP7LW7v1RjsfQk/spL8F/mb47ctdsr15pQGcOGm5xrW5ud4wl1uFtbZvtt3nFglJxqRgnJpOUrLdGK1pPsSTfyLZnNFLB4F226te7/n/APn+kQWaXpYj34XHW+WDrXIrkna04400TRS+db66K8Rp5l2id85/yV4jURm8jH2Zdn1UayrGzt5tT/On/kQ+UsW1F602rprbLfsJXSD+9Ifw1L86oRGdeGjGFC2+dNyk+vnJrgkdmPJGPBE63MqWrXm7RtSFRmm0007rfs3q6/oaxmBjYrAu80k5OMduxyaSS/EoedSisZXStfy0Ni3qPk52T/qWXMVXwFJf8RT8cTlpf4XzT0XbR5K9Crf/AHsuCLWVPR36mt8WXBFsKZ/UlNY1EAAMlgAAAAAAAAAAAAAAAEZnKvNa3d+qMbvyZdi4RNlzk9lrd36oyKhRjZSavdWad7P5G2Os2rqGdrcs7cmeNS2TsC9ztXS+1y3u7Nv4v3EDm7iYRdRyaS/Z8bHa7XlPC1YRXa5SS+Z6Z14mc6sKbdqdOPIgtkY33tLrZCqCS2e/gTXHMT1TN4mGuaJ1aovgLxGpGW6KXzq+D9TUiubyKdmV6Rf3pS/hqf59Qi88ZryeGae6lbZ0NVamwk9JH70oe/DQ/PmRGIowd3V1qiW2MLqMV0tNra7nVGO18EcvtKZpMzFojff9kFnrUaxte7Wr5a6SVmkqV3ttt2tlozHlrYSHvxFPZ/NG5n+PrzrVqtapZyqTU5bFbYnFLss7GnZg4WksPOpFSTV9WDleEJOL1ppWW13t7luOfHSZlN8dpjWu6zaOvVV/ivgi2lR0c+qr/F/Si3Fc/qStManQADJAAAAAAAAAAAAAAAACNzjXmtbu/VGR4eKcFs6+JrucPs1bu/VGL4jKMaNOLkpPWcrKNuh+86cExETthliZnoreckefsr2tHpZHwj+rws9ctZRjUq66U0rJWer0djPDD1VLdfp391kzaPYiJiGraKX5xFfcy4o1kyXRO/OI/Bl4ka0ZZvJfFO6syz9wvlMq4eN7P9njb/zzPDH5vTUW9eO59BIZ47Mr4X30Ev8A3s6ssY2lTi1Uq06bknqqc4xctnRd7TnvxWbHPLSehz6nUR1/vP7MajRd3u/r1mwaPMDfCO7sm+i3V7zJoVIXfKh/3LrNg0a4mnLCuMZwlKL5SjJNpPc2kaTltHaSL2mdTH+UlmVhlT/aIJ3SqLwlmK/ms+XifiLwlgI5pt1nutWdxsAAWAAAAAAAAAAAAAAAAR2cPs1bu/VGB5w+rpdtTijfM4fZq3dZjLwdOrTSnG9nJra01tfSdGKN1mGV51aJZ5id594Bcq/ufBkpl3BQp1dWCaVk9rvtZy0KaW3t8LImkwTeJhqOib2iPwZeJGuGRaJvaIfBnxRrpGfyMPgzrPb964R/c/4xRNKTf7Wvg0/FMveff7zwb+6l+aiCz4zaq4mca1KVPZBQlGbcXsbaadnff/Q5rdLxMqReIyzEsmT2ms6G3ztVfdPxwM0//MlrNdXvNd0S5IlTjUrylFqUfJxir33ptt/yo0vMabc0Ldmq+cxXxFwLEVvNV87iu+uBZCFMM7pAAA1AAAAAAAAAAAAAAAAR2cPs1buMx/CPk/OXiZsGcPs1buMx7CPk/OXiZ1cP2YZlXzl9cu6vqR9P/Pwskc5fXfyr6kbD6vwstb3Z/wArTdE784p/BnxRrxj+ib2il8KfFGwGOfybYfBnOkF2yjgn93U/MifmMr2T+Z+aR3bH4F/d1fHEj8oVug1wYud8/wDWM/28kM61uVLtfE1/RlPzafeXAx5+k+18TW9F8vN6i98eDLZafol20trJX5/5KezU9diu8izFYzTfPYrvL6lnOS0al6PDTvFAACrcAAAAAAAAAAAAAAABH5w+zVu4zHML6Pzl4mbHnB7NW7kjHcOuT85eJnVw/aWGZWM5PXLur6kbHd834WSmca51d1fUjOj5/pZezKfFpWif19H4VTijYDIdE652g/sVDXjHP5t8PizbSa/PcC/sVuMCExct5NaUfbMA/s1+MCv4mR38DXdXyv1/rnrHwpT9J9r4mraLpczVXvj9TK5enLtZqGjCXN1v5PqVyx+i357vWvHLfHPz/rKyZpevxPauLLSVXNF8/iPl4mWo8/LGrO/gp3hqAAzdQAAAAAAAAAAAAAAACPy/7NW7kuBj9Nb+2XFmw5e9mrdyXAx9dPa+J08P7sMysZxLnV2LiyNmuT8/0slcvrnF2LiyMrrk/P6M1nuynwaVonXLoP7M/qa4ZJom9Kj3Z/U1s58/m3xeLNdKvtWA7uI/wyuT2lj0se0ZP/6nhTK/NHp8B6bwPqeD7nF1+IU6a5cu18TStGj5FXsjxZm01y5drNG0cvkVexcWReP0W/Pd6XFU1FZ/pP7StGZ75/Ef6/tMthUczXz1fs/UW483P6ktvp/8PUABi7AAAAAAAAAAAAAAAAHDlz2et3JcDHV09r4myZZ9nrdyfhZja6e18Tp4f3YZley4ucXYuLIzFLkfNcGSuW1y12fUi8Z6HzXBms+TG3hLR9EnpUe5P6muGR6I/So9yf1NcMOI83Tj7M30sLn8nv34hf3aZXa7LLpZXOZPf26/ggViuz0uA9Ny3w8/ERPwqdRcuXazQdHfo1excSgVPTl2sv2jx7KvdXEW8bfnu6eMx/8AmtOZvrq/Z+ot5UMzfX1+z9RbzzeJ9SWPAxrBWAAGDrAAAAAAAAAAAAAAAAceV/UVu5PwsxldPa+Js+V/UVvhz8LMXXT2vidPD+7DMhspO04yava2x2s+m225x5wwSslq/wBnZGLjFbXuTu/xbOzKSevFxvrbErb3K/Qcecj2722rJ3lrNPWls7Opb7WLY/ZXLHSV60R+nR7k/qa8ZBoifLo92f1NfMs/k2p2Z5pa9LAP7yt4IlUxDLXpd/2F/e1PyypVdz7D0eCnWGZbYMe8u1eVJyqNLa23Zdb6i95h0pQlVjJastRXi9627muh+4ptK/lVq7Ja2/W1NnVrXVukvmQGlWnq2t5NJastePpPc+lLdu6DPHkm8T8tuJpuuk5md7RX7H4i4FNzNfnNfsfiRcjk4r1JcGCvLjiAAHO2AAAAAAAAAAAAAAAAcmVvUVvhz8LMWi9/azaMsez1vh1PCzFFLf2s6eH92OZFZQnaSa3qzW7Z1b95EZSrOSbltd1uSXAk8qy2+8h8TtVveTj7oydYaRoi9Oj3Z/U2AxzRLK1Wkvsz4M2Mzz+TSnZnml/0cE/vpflsqUtz7C26YVzeDfVXl+Wyo35L7HwOvBbWCXfwdesyjKVFyqKK9Jt9fRt6E3fZ0Jl1yPLn6is42jbamk+U9qV3Zcdr2XKPNrWfVd+8s2Z72z7DDhLbmYn5dE05ltzNfnNbu/qLoUnMx+c1u6+KLsV4r1ZeZNeXoAA50AAAAAAAAAAAAAAAAPHGwUqdSL3OMk+xxZl+LzTabdOcrXexxU1+Kaf9DU6/oy7HwK9VgXpaa9lbVie7IcuZvYhTVtV7Oqqun3xOKhm1XlKzstvRGT4pGw1KEXvSPyFCPUi/3JV5IQ2j7ICoVITk3KVmleySb6ords62zSCGybBKSsiZKXncrxDPtL65rC+6rJ/3CmUpbLXs7fgzTs+ckftFOlHZyZOW3ssU2tmp1ScX9mez8JR/Ub471+3NZb4M/wBu3WNwplWfKa972byzZnSvKXYcFXMzEObansu7XjG/46xaMz823SlJ1XfZss1Hp7GVwRXFO9tp4uK9o2lMzH51VX2XxReCAyJgoU6spRVnK997/qyfK57xe+4cfNNus9wAGIAAAAAAAAAAAAAAAA+am59j4ENUpk1LcyPnTJgRk4HwqZIOifUMOSgwENqJU56FKx0FUuHKi2R+ZDVKROZQWxEVJFoHH5FHTh4H7qntSRMSOjJ65fyZKEbgVy/xJIrIAAgAAAAAAAAAAAAAAAAfjOaQAHyekD9BI9Yn0AQPDF7iJqbwCYHyj1pgEwOrBel+JIAESAAIAAAAAAAAH//Z" alt="Image" height="200px">
                              <div class="card-body">
                                  <h5 class="card-title"> {{ $item->title }} </h5>
                              </div>               
                              <input type="hidden" name="id" value="{{ $item->id }}">
                </div>
                <div class="btn-group">
                        <button class="btn bg-light border">
                          <i class="far fa-thumbs-up"></i>  
                          Like
                        </button>
                        <button class="btn bg-light border">
                          <i class="far fa-comment"></i>  
                            Komentar
                        </button>
                </div>
            </div>
            <br>
        </form>
    @endforeach
@endif 