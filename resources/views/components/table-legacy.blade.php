@props([
	'rows' => [],
	'columns' => [],
	'striped' => false,
	'actionText' => 'Action',
	'tableTextLinkLabel' => '',
])

<div 
	x-data="{
		columns: {{ collect($columns) }},
		rows: {{ collect($rows) }},
		isStriped: Boolean({{ $striped }})
	}"
	x-cloak
	:key="{{ md5(collect($rows)) }}"
>
	<div class="overflow-x-scroll custom-scrollbar">          
		<table class="w-full my-8 text-sm whitespace-nowrap">
			<thead class="text-left border-b border-gray-100">
				<tr>
					@isset($tableColumns)
						{{ $tableColumns }}
					@else	 
						@isset($tableTextLink)
							<th class="p-3 font-semibold">
								{{ $tableTextLinkLabel }}
							</th>
						@endisset

                        <template x-for="column in columns">
                            <th :class="`${column.columnClasses}`" class="p-3 font-semibold" x-text="column.name"></th>
                        </template>

                        {{-- Displays when Custom name slots for action links is shown --}}
                        @isset($tableActions)
                            <th class="p-3 font-semibold text-center">{{ $actionText }}</th>
                        @endisset
                    @endisset
                </tr>
            </thead>
            <tbody>

                <template x-if="rows.length === 0">
                    @isset($empty)
                        {{ $empty }}
                    @else
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td colspan="100%" class="px-4 py-10 text-sm text-center">
                                No records found
                            </td>
                        </tr>
                    @endisset
                </template>

				<template x-for="(row, rowIndex) in rows" :key="'row-' +rowIndex">
					<tr class="border-b border-gray-100 hover:bg-gray-100" :class="{'bg-gray-50': isStriped === true && ((rowIndex+1) % 2 === 0) }">
						@isset($tableRows)
							{{ $tableRows }}
						@else
							@isset($tableTextLink)
								<td
									class="p-3 py-4 text-gray-600 whitespace-nowrap">
									{{ $tableTextLink }}
								</td>
							@endisset

							<template x-for="(column, columnIndex) in columns" :key="'column-' + columnIndex">
								<td 
									:class="`${column.rowClasses}`"
									class="p-3 py-4 text-gray-600 whitespace-nowrap">
									<template x-if="column.images == 'true'">
										<div x-html="`<img src='${row[column.field]}' width='42' height='42' />`" class="truncate"></div>
									</template>
									<template x-if="!column.images">
										<div x-text="row[column.field] != null ? `${row[column.field]}` : ''" class="truncate"></div>
									</template>
								</td>
							</template>

							{{-- Custom name slots for action links --}}
							@isset($tableActions)
								<td
									class="p-3 text-center">
									{{ $tableActions }}
								</td>
							@endisset
						@endisset
					</tr>
				</template>

            </tbody>
        </table>
    </div>
</div>
