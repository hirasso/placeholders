<?php

/**
 * PHPUnit WP integration test bootstrap file
 */

namespace Hirasso\WP\Placeholders\Tests\WP;

use Yoast\WPTestUtils\WPIntegration;

// Disable xdebug backtrace.
if (\function_exists('xdebug_disable')) {
    \xdebug_disable();
}

echo 'Welcome to the Thumbhash Placeholders Test Suite' . \PHP_EOL;
echo 'Version: 1.0' . \PHP_EOL . \PHP_EOL;

/*
 * Load the plugin(s).
 */
require_once \dirname(__DIR__, 2) . '/vendor/yoast/wp-test-utils/src/WPIntegration/bootstrap-functions.php';

define('FIXTURES_ORIGINAL_IMAGE', '/tests/fixtures/original.jpg');
define('FIXTURES_EXPECTED_HASH', 'YTkGJwaRhWUIt4lbgnhZl3ath2BUBGYA');
define('FIXTURES_EXPECTED_DATA_URI', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAQxklEQVR4AQCBAH7/AEN+gv9HgIP/TYOE/1SHhf9dioX/ZY2D/26PgP92kHz/fpB3/4eSc/+RlXL/nZty/6uidv+4q3v/xbOB/9C7h//XwIz/28OP/9rCkP/WwI//0LyP/8m4jv/CtY//u7KR/7WxlP+xsZn/rbKe/6qzo/+otKf/prWr/6W2rf+ktq7/AIEAfv8AQnt//0V8gP9LgIH/UoOC/1uHgf9jioD/a4t8/3OMeP97jHP/hI5v/46Rbf+alm7/p51x/7Wmdv/Crnz/zLaC/9S7h//Xvor/176L/9O8i//OuIv/x7WL/7+xjP+5r47/tK6S/6+vlv+ssJz/qbGh/6eypf+ls6n/pLSr/6O0rf8AgQB+/wA+dXn/Qnd6/0d6e/9Pfnz/V4F7/2CDef9nhXX/b4Vx/3aFbP9/hmf/iYll/5SOZv+hlWj/r51t/7umc//GrXn/zrN+/9G2gv/RtoP/zrSE/8mxhP/CroT/u6uF/7apiP+xqYz/raqS/6qrl/+nrZ3/pq6i/6Swpv+jsaj/orGq/wCBAH7/ADxucv8/cHP/RHN0/0x3dP9UenT/XHxx/2N9bf9qfWj/cXxi/3l9Xv+Cf1v/joRb/5qKXf+nkmL/tJpo/76ibv/Gp3P/yqt3/8qref/Hqnr/wqd6/7yle/+2o33/saKB/62ihv+qo4z/p6WS/6WomP+kqp3/o6ui/6KspP+hrab/AIEAfv8AOmhr/z1qbP9DbW3/SnBt/1JzbP9ZdWr/YHVl/2Z0X/9tc1n/dHNU/311Uf+HeVD/k39S/6CGVv+sjlz/tpVi/76bZ//Cnmv/w59t/8Cfb/+8nXD/t5ty/7Kadf+tmXn/qpp//6edhf+ln4z/pKKT/6Okmf+ipp3/oqig/6Goov8AgQB+/wA8ZWf/P2Zn/0RpaP9LbGj/Um5n/1lwZP9gb1//ZW5Y/2tsUv9xa0v/eWxH/4NvRv+OdEf/mntL/6aDUP+wilb/t49b/7uTX/+8lGL/upRk/7eSZv+ykWn/rpFs/6qRcf+nk3j/ppaA/6WZh/+knY//o6CV/6Oimv+ipJ3/oqSf/wCBAH7/AEJkZv9EZmb/Smhn/1BrZ/9XbWX/Xm5h/2NtXP9oa1X/bWhN/3JmRv95ZkH/gmg+/4xsP/+XckL/onlH/6yATP+zhVH/t4lV/7iKWP+3ilv/tIpe/7CJYf+siWX/qYtr/6eNc/+mkXv/pZWD/6WZi/+lnJL/pZ+X/6Whm/+loZ3/AIEAfv8AS2do/05paP9Ta2n/Wm5o/2BvZv9mcGL/a25c/29rVP9zaEz/d2VE/31kPv+FZDr/jmg6/5htPP+ic0D/q3lF/7J+Sv+2gU7/t4NR/7aDVP+zg1f/sINb/62EYf+qhmf/qYlv/6iNeP+okoH/qZaK/6makf+pnZf/qZ+b/6mgnf8AgQB+/wBYbm3/W29t/2Bxbv9mdG3/bHVr/3J1Z/92c2D/em9X/31rTv+AZ0X/hWQ+/4tkOv+TZjj/nGs6/6VwPf+udUH/tHpG/7h9Sv+5fk3/uH9Q/7V/VP+yf1j/r4Be/66DZf+th27/rYx3/62Rgf+ulYr/r5qS/6+dmP+vn5z/r6Ce/wCBAH7/AGd2dP9qd3T/b3l0/3V8dP97fXL/gHxt/4R6Zv+HdV3/iXBT/4tsSf+PaEH/lGc8/5toOf+jazr/q3A8/7N0QP+5eET/vHtI/718S/+8fU7/uX1S/7Z9V/+0f13/soJl/7KGbv+yi3j/s5GC/7SWi/+1mpP/tp6a/7agnv+2oaD/AIEAfv8Adn56/3l/e/99gXv/g4R7/4qFef+PhHT/koFs/5R9Y/+Wd1j/mHFO/5ptRf+eaz//pGs8/6ttPP+zcT3/unVB/794RP/Cekj/wnxL/8F8Tv++fFL/vH1X/7l/Xf+4gmX/uIZv/7iMef+5kYT/u5eN/7yclv+9n5z/vaKh/76jo/8AgQB+/wCChH//hYaA/4qIgP+QioD/lox+/5uLef+fiHL/oYNo/6J9Xv+jd1P/pXJK/6hvQ/+tbj//tHA+/7pzP//AdkH/xXlE/8d6SP/He0v/xnxO/8N8Uv/AfFf/vn5e/72CZv+9hnD/vox7/7+Shf/AmI//wpyY/8Ognv/Do6P/xKSl/wCBAH7/AIqHgf+NiYH/k4uC/5mOgv+fkID/pY98/6iMdf+qiGv/q4Fh/6x7Vv+tdUz/sHJF/7RxQP+6cT//wHM//8V2Qf/JeET/y3pH/8t6Sv/Jek3/xnpR/8R7Vv/BfV3/wIFm/8CFcP/Bi3v/w5GG/8SXkP/GnJj/x6Cf/8ejpP/IpKb/AIEAfv8AjoZ+/5GIf/+Xi4D/nY6A/6SQf/+qkHv/ro10/7CJa/+xg2H/sXxW/7J2TP+1c0T/uXFA/75xPv/Dcz7/yHVA/8t3Qv/NeEX/zHhI/8p4S//HeE//xHhU/8J6W//BfmT/wYNu/8KJef/Ej4T/xZWP/8eal//Inp7/yaGj/8mipf8AgQB+/wCMgXf/kIN4/5WGef+dinr/pIx6/6qNd/+vi3D/sYdo/7KBXf+ze1P/tHVJ/7ZxQv+6bz3/vm86/8NwOv/Icjz/y3M+/8x0Qf/LdET/yXRH/8ZzS//DdFD/wHZX/795YP+/fmr/wIR2/8KKgf/DkIv/xZaU/8aam//HnaD/x56j/wCBAH7/AId5bf+Ke27/kH9w/5iDcv+ghnL/p4hv/6yGav+vg2L/sX1Y/7F3Tv+ycUT/tG09/7hrOP+8azb/wWw2/8VtN//Hbjn/yG88/8dvPv/FbkH/wW5F/75uSv+8cFL/unNa/7p4Zf+7fnD/vYR8/76Khv/AkI//wZSW/8KXm//CmJ7/AIEAfv8Af3Bi/4NyY/+Jd2b/knto/5p/af+igWf/p4Bi/6t9W/+teFL/rnJI/69tP/+xaTf/tGcz/7hmMP+9ZzD/wGgx/8NpM//DaTb/wmk4/79oO/+7Zz//uGhE/7VpS/+0bFT/s3Fe/7R3av+2fXX/t4OA/7mIif+6jJD/u4+V/7uRl/8AgQB+/wB3aFj/e2tZ/4JvXP+LdF//lHlg/5x7YP+ie1z/pnlV/6l0TP+qb0P/q2o6/61lM/+wYy7/tGIs/7hjK/+8ZC3/vmUu/75kMf+8ZDP/uWI2/7VhOf+xYT7/rmNF/6xmTv+ralj/rHBj/612b/+vfHn/sIGC/7GFiv+yiI//s4mR/wCBAH7/AHFjUP91ZlL/fGtW/4VwWf+PdVv/mHlb/595V/+jd1H/pnNJ/6duQP+paTf/q2Qw/65iLP+xYSn/tWEp/7hiKv+6Yiz/uWIt/7dgL/+zXzL/r101/6pdOv+nXkD/pGBJ/6RlU/+kal7/pXBp/6Z2dP+oe33/qX+E/6mBif+qg4v/AIEAfv8AbWJN/3JlT/95alP/g3BX/452Wv+Xelr/nntX/6N5Uf+mdUr/p3BB/6lrOf+rZzL/rWQt/7FjKv+0Yyr/tmMq/7djLP+3Yi3/tGAv/69eMf+qXDT/pVs4/6FbPv+eXUb/nWFQ/51mW/+ebGb/n3Fw/6B2ef+heoD/on2F/6J+iP8AgQB+/wBuZk//c2lR/3tuVf+FdVn/j3tc/5l/Xf+ggFv/pn9W/6l7Tv+qdkb/rHE9/61tNv+wajH/s2kv/7ZoLv+4aC7/uGcv/7ZlMP+zYzH/rmAz/6heNf+jXDn/nlw//5pdR/+ZYVD/mGVa/5hqZf+ZcG//mnR4/5t4f/+be4T/nHyG/wCBAH7/AHJuVf93cVf/f3db/4l9YP+UhGP/nohk/6aKYv+riF3/roVW/7CATv+xe0X/s3Y+/7VzOf+3cTb/uXA1/7twNf+7bjb/uWw3/7VpN/+vZjj/qGM6/6JgPf+dYEP/mWFK/5ZjU/+VZ13/lWxn/5Zxcf+Wdnr/l3mB/5d8hf+XfYj/AIEAfv8AeHhd/317YP+FgWT/j4hp/5uPbP+lk27/rZVs/7KUZ/+1kGD/t4tY/7iGT/+5gkj/u35D/718QP+/ez//wHk+/794P/+9dT//uHI//7JuQP+rakH/pGdE/55mSf+ZZlD/lmhY/5RsYv+UcGz/lHV2/5R5fv+VfYX/lX+J/5WAjP8AgQB+/wB+g2b/goZo/4uMbf+Vk3L/oZp2/6ued/+zoHb/uKBx/7ycav+9l2L/vpJa/7+NU//BiU3/w4dK/8WGSf/FhEj/xIJI/8F/SP+8e0j/tXdJ/65zSv+mb0z/oG1R/5ptV/+Xb1//lXJo/5R2cv+Ue3z/lH+E/5SCiv+UhI//lYWR/wCBAH7/AIGLbf+Gj2//jpV0/5mcef+lo33/r6h//7eqfv+9qXn/wKZz/8Khav/DnGL/xJdb/8WTVv/HkVP/yY9S/8mOUf/IjFH/xYlR/8CFUf+4gFH/sHtS/6l3VP+idVj/nHVe/5h2Zv+WeW//lX15/5SBgv+UhYr/lYiR/5WKlf+Vi5j/AIEAfv8AgZBw/4aUc/+Pmnf/mqF9/6Wogf+wrYP/uLCC/76vfv/BrHj/w6dw/8SiaP/FnmH/x5pc/8mYWf/Ll1j/y5VY/8qTWP/HkFj/wYxY/7qHWP+yg1n/qn9b/6N8X/+dfGX/mX1t/5eAdv+Vg4D/lYeJ/5WLkf+Vjpf/lZCc/5WRnv8AgQB+/wB9kW//gpRy/4qbd/+Vonz/oamB/6yvg/+1sYL/u7F//76ueP/AqnH/wqVq/8OhY//Fnl//yJxc/8qbXP/Lmlz/yphc/8eVXf/BkV3/uoxd/7KIXv+qhGD/o4Fk/52Bav+ZgnL/loV7/5WIhf+UjI7/lJCW/5STnf+UlaH/lJaj/wCBAH7/AHWNav95kW3/gpdy/46feP+apnz/pax//62vf/+0r3v/uKx1/7qobv+8pGf/vqBi/8CdXv/DnFz/xptc/8ebXP/HmV3/xJde/7+TX/+4j2D/sIth/6iHY/+hhWj/m4Ru/5eFdv+ViH//k4yI/5OQkv+TlJr/k5eg/5OZpf+Tmqf/AIEAfv8AaoZi/2+KZf94kGr/g5hw/4+gdf+bpnj/pKl4/6updf+vp3D/sqRp/7SgY/+3nF3/uZpa/72ZWf/AmVn/wpla/8KYXP+/ll3/u5Nf/7SPYP+ti2H/pYhk/56Gaf+Zhm//lYd3/5KKgf+Rjor/kZKU/5GWnP+RmaP/kZun/5Gcqv8AgQB+/wBffln/ZIJc/22IYv95kGj/hZht/5GecP+aonD/oaNu/6ahaf+pnmP/rJpd/6+XWP+yllX/tpZU/7mWVf+8llf/vJZZ/7qVW/+2kl3/sI5f/6mLYf+iiGT/m4Zp/5aGb/+Sh3j/kIqB/4+Oi/+Ok5X/jpad/46apP+PnKj/j52r/wCBAH7/AFZ3Uv9be1X/ZIJa/3CKYP98kmb/iJhp/5Kcav+ZnWf/nptj/6KYXf+llVf/qJNT/6ySUf+wklD/tJNS/7eTVP+3lFf/tpJZ/7KQW/+sjV3/popf/5+HY/+YhWj/k4Vv/4+Hd/+NioH/jI6L/4yTlf+Ml53/jJqk/42cqf+Nnav/AYEAfv8AUXNO/1Z3Uf9fflb/a4Zc/3iOYv+DlGX/jZhm/5WZZP+amF//npVa/6GSVP+kkFD/qI9O/6yPTv+xkU//tJJS/7WSVf+0kVj/sI9a/6qMXP+kiV//nYZi/5aFZ/+RhW7/jod3/4yKgf+Ljov/i5KV/4uXnf+LmqT/i5yp/4udq/9K+TlgJjQbSAAAAABJRU5ErkJggg==');

// Get access to tests_add_filter() function.
require_once WPIntegration\get_path_to_wp_test_dir() . 'includes/functions.php';

\tests_add_filter(
    'muplugins_loaded',
    static function () {
        require_once \dirname(__DIR__, 2) . '/placeholders.php';
    }
);

/*
 * Load WordPress, which will load the Composer autoload file, and load the MockObject autoloader after that.
 */
WPIntegration\bootstrap_it();
